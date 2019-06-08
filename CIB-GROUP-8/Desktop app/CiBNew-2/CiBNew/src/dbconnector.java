import java.io.FileWriter;
import java.io.IOException;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.Scanner;

import com.opencsv.CSVWriter;
import static com.opencsv.CSVWriter.DEFAULT_SEPARATOR;
import static com.opencsv.CSVWriter.NO_QUOTE_CHARACTER;

public class dbconnector {
	private static Connection conn;
	private static Statement query;
	private static ResultSet result;

	private static CSVWriter write = null;

	public static void startConnect() throws ClassNotFoundException, SQLException, IOException{
		Class.forName("com.mysql.jdbc.Driver");

		conn = DriverManager.getConnection("jdbc:mysql://localhost/newCiB?user=web&password=cibweek");

		query = conn.createStatement();


	}

	public static void getEmpTimesheets(int empID) throws SQLException, IOException{
		result = query.executeQuery("SELECT * FROM `timesheet_table` AS tt, `project_table` AS pt WHERE tt.PROJECT_ID = pt.PROJECT_ID AND tt.EMP_ID =" + empID);

		write = new CSVWriter(new FileWriter("test.csv"), DEFAULT_SEPARATOR, NO_QUOTE_CHARACTER);
		write.writeAll(result, true);

		write.close();
	}

	public static void getDateRange(String startDate, String endDate) throws SQLException, IOException{
		result = query.executeQuery("SELECT * FROM `timesheet_table` AS tt, `project_table` AS pt WHERE tt.PROJECT_ID = pt.PROJECT_ID AND START_TIME BETWEEN '" + startDate + "' and '" + endDate + "'" );

		write = new CSVWriter(new FileWriter("test.csv"), DEFAULT_SEPARATOR, NO_QUOTE_CHARACTER);
		write.writeAll(result, true);

		write.close();
	}

	public static void getProjectTimesheet(int projectID) throws SQLException, IOException{
		result = query.executeQuery("SELECT EMP_ID, tt.PROJECT_ID, pt.PROJECT_NAME, pt.PROJECT_MANAGER, SUM(HALF_DAYS) as 'Total Half Days' FROM `timesheet_table` AS tt, `project_table` AS pt WHERE tt.PROJECT_ID = pt.PROJECT_ID AND tt.PROJECT_ID = " + projectID + " GROUP BY EMP_ID");

		write = new CSVWriter(new FileWriter("test.csv"), DEFAULT_SEPARATOR, NO_QUOTE_CHARACTER);
		write.writeAll(result, true);

		while(result.next()){

		}

		write.close();
	}

	public static void getMultipleEmpTimesheets(int... empID) throws SQLException, IOException{
		String queryStr = "SELECT TIMESHEET_ID, EMP_ID, tt.PROJECT_ID, START_TIME, HALF_DAYS, OVERTIME, APPROVAL FROM `timesheet_table` AS tt INNER JOIN project_table ON tt.PROJECT_ID = project_table.PROJECT_ID WHERE EMP_ID IN (";

		boolean first = true;

		for(int i = 0 ; i < empID.length ; i++){
			if(first){
				queryStr += empID[i];
				first = false;
			} else{
				queryStr += "," + empID[i];

			}
		}
		
		queryStr += ") ORDER BY EMP_ID ASC";

		System.out.println(queryStr);

		result = query.executeQuery(queryStr);

		write = new CSVWriter(new FileWriter("test.csv"), DEFAULT_SEPARATOR, NO_QUOTE_CHARACTER);
		write.writeAll(result, true);

		write.close();
	}
	
	public static void getOvertimeForEmployee(int empID) throws SQLException, IOException{
		String queryStr = "SELECT * FROM `timesheet_table` AS tt INNER JOIN project_table ON tt.PROJECT_ID = project_table.PROJECT_ID WHERE tt.EMP_ID = " + empID + " AND tt.OVERTIME = 1";

		System.out.println(queryStr);

		result = query.executeQuery(queryStr);

		write = new CSVWriter(new FileWriter("test.csv"), DEFAULT_SEPARATOR, NO_QUOTE_CHARACTER);
		write.writeAll(result, true);

		write.close();
	}

	public static void main(String[] args) throws ClassNotFoundException, SQLException, IOException{
		Scanner scan = new Scanner(System.in);

		startConnect();

		System.out.println("1. All Timesheets from selected employee");
		System.out.println("2. All Timesheets from multiple employees");
		System.out.println("3. Timesheets between date range");
		System.out.println("4. Timesheets for a project");
		System.out.println("5. Overtime recorded for an employee");

		int choice = scan.nextInt();
		scan.nextLine();

		switch(choice){
		case 1:
			System.out.print("Enter Employee ID: ");
			getEmpTimesheets(scan.nextInt());
			break;
		case 2:
			System.out.print("Enter Employee IDs: ");

			String temp = scan.nextLine();
			String[] arr = temp.split(",");

			int[] idArr = new int[arr.length];

			for(int i = 0; i < arr.length ; i++){
				idArr[i] = Integer.parseInt(arr[i]);
			}

			getMultipleEmpTimesheets(idArr);
			break;
		case 3:
			System.out.print("Enter Start Date (YYYY-MM-DD): ");
			String start = scan.next();
			System.out.print("Enter End Date (YYYY-MM-DD): ");
			String end = scan.next();
			getDateRange(start, end);
			break;
		case 4:
			System.out.print("Enter Project ID: ");
			int pID = scan.nextInt();
			getProjectTimesheet(pID);
			break;
		case 5:
			System.out.print("Enter Employee ID(s): ");
			getOvertimeForEmployee(scan.nextInt());
		}
	}
}
