import java.awt.Color;
import java.awt.Font;
import java.awt.Image;
import java.awt.Toolkit;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.text.SimpleDateFormat;
import java.util.Arrays;
import java.util.Calendar;
import javax.swing.ImageIcon;
import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.JPasswordField;
import javax.swing.JTextField;
/**
 * Author: [PATRICK DAVIS and CONOR TYLER of BOURNEMOUTH UNIVERSITY]
 * Date began: [10/05/17]
 * Description: [This is a conceptual desktop time sheet application.]
 * Created for: [Systems, analysis and design assignment at BU Semester 2.]
 */
public class timesheetDesktop {
	private JFrame loginFrame, mainFrame;
	private JPanel mainPanel, loginPanel;
	private JButton btnCloseGame,btnHelp,btnSubmitUserName,btnSubmitData,btnShowKey,btnSubmitLogin;
	private JTextField txtUserName;
	private JPasswordField txtPassword;
	private JLabel lblTitle,imgBackground,lblUserName,lblPassword,lblTitleLogin;
	private ImageIcon imgBackgroundIcon = new ImageIcon("background.png");
	private ImageIcon imgBackgroundIcon1 = new ImageIcon("loggedin.png");
	private Image clockIcon = Toolkit.getDefaultToolkit().getImage("clock-icon.png");
	Calendar cal = Calendar.getInstance();
	int week = cal.get(Calendar.WEEK_OF_YEAR);
	String date = new SimpleDateFormat("dd-MM-yyyy").format(Calendar.getInstance().getTime());

	public static void main(String[] args) {
		new timesheetDesktop();
	}
	/**
	 * This constructor ensures methods are run in the correct order. This is important as the background needs to be rendered last so that elements are on top of it.
	 */
	public timesheetDesktop(){
		createLoginFrame();
		addJLabels();
		addJButtons();
		addJTextFields();
		addJPasswordFields();
		configLoginFrame();
		addBackgroundLogin();
	}
	public void createLoginFrame(){
		System.out.println(date);
		loginFrame = new JFrame();
		loginFrame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		loginFrame.setSize(1205,1035);
		loginFrame.setIconImage(clockIcon); 
		loginFrame.setTitle("KITS Timesheet system / " +  "(Current Week " + week + ")" + " / " + date );
		loginFrame.setExtendedState(JFrame.MAXIMIZED_BOTH);
		loginFrame.setResizable(false);
		loginPanel = new JPanel();
		loginPanel.setLayout(null);
	}

	public void addJLabels(){
		lblTitleLogin = new JLabel("PLEASE LOGIN!");
		lblTitleLogin.setHorizontalAlignment(JLabel.CENTER);
		lblTitleLogin.setFont(new Font("Helvetica", Font.BOLD,24));
		lblTitleLogin.setForeground(Color.red);
		lblTitleLogin.setBounds(425,300,400,100);
		loginPanel.add(lblTitleLogin);

		lblUserName = new JLabel("Employee ID:");
		lblUserName.setHorizontalAlignment(JLabel.CENTER);
		lblUserName.setFont(new Font("Helvetica", Font.BOLD,24));
		lblUserName.setBackground(Color.yellow);
		lblUserName.setForeground(Color.black);
		lblUserName.setBounds(220,475,400,100);
		loginPanel.add(lblUserName);

		lblPassword = new JLabel("Password:");
		lblPassword.setHorizontalAlignment(JLabel.CENTER);
		lblPassword.setFont(new Font("Helvetica", Font.BOLD,24));
		lblPassword.setBackground(Color.yellow);
		lblPassword.setForeground(Color.black);
		lblPassword.setBounds(230,575,400,100);
		loginPanel.add(lblPassword);
	}

	public void addJButtons(){
		btnSubmitLogin = new JButton("Login");
		btnSubmitLogin.setToolTipText("This will enter your timesheet data.");
		btnSubmitLogin.setBounds(555,730, 120, 50);
		btnSubmitLogin.setFont(new Font("Helvetica",Font.PLAIN,24));
		loginPanel.add(btnSubmitLogin);
		btnSubmitLogin.addActionListener(new ActionListener(){
			public void actionPerformed(ActionEvent event){

				char[] password = txtPassword.getPassword();
				char[] correctPass = new char[] {'d','e','m','o'};
				if(txtUserName.getText().equals("2517") && Arrays.equals(password, correctPass)){
					mainFrame = new JFrame();
					mainFrame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
					mainFrame.setSize(1205,1035);
					mainFrame.setIconImage(clockIcon); 
					mainFrame.setTitle("KITS Timesheet system / " +  "(Current Week " + week + ")" + " / " + date  );
					mainFrame.setExtendedState(JFrame.MAXIMIZED_BOTH);
					mainFrame.setResizable(false);
					mainPanel = new JPanel();
					mainPanel.setLayout(null);	
					mainFrame.add(mainPanel);
					mainFrame.setVisible(true); 

					lblTitle = new JLabel("Welcome to KITS timesheet.");
					lblTitle.setHorizontalAlignment(JLabel.CENTER);
					lblTitle.setFont(new Font("Helvetica", Font.BOLD,24));
					lblTitle.setForeground(Color.red);
					lblTitle.setBounds(500,50,400,100);
					mainPanel.add(lblTitle);

					btnSubmitData = new JButton("Submit!");
					btnSubmitData.setToolTipText("This will enter your timesheet data.");
					btnSubmitData.setBounds(70,175, 200, 75);
					btnSubmitData.setFont(new Font("Helvetica",Font.PLAIN,24));
					mainPanel.add(btnSubmitData);

					btnHelp = new JButton("Help");
					btnHelp.setBounds(70,270,200,75);
					btnHelp.setToolTipText("This features a menu that explains the game.");
					btnHelp.setFont(new Font("Helvetica",Font.PLAIN,24));
					mainPanel.add(btnHelp);

					btnCloseGame = new JButton("Exit timesheet");
					btnCloseGame.setToolTipText("THIS WILL CLOSE THE PROGRAM - ARE YOU SURE?");
					btnCloseGame.setBounds(70,370, 200, 75);
					btnCloseGame.setFont(new Font("Helvetica",Font.PLAIN,24));
					mainPanel.add(btnCloseGame);

					btnShowKey = new JButton("Key");
					btnShowKey.setBounds(70,470,200,75);
					btnShowKey.setToolTipText("This will open a window explaining what the card numbers equal to.");
					btnShowKey.setFont(new Font("Helvetica",Font.PLAIN,24));
					mainPanel.add(btnShowKey);

					btnSubmitUserName = new JButton("Submit");
					btnSubmitUserName.setToolTipText("It's advised you type in a name at the text field and press this button to submit it. First name only is preferred.");
					btnSubmitUserName.setBounds(70,470,200,75); 
					btnSubmitUserName.setFont(new Font("Helvetica",Font.PLAIN,24));
					mainPanel.add(btnSubmitUserName);

					imgBackground = new JLabel(imgBackgroundIcon1);
					imgBackground.setBounds(0,0,1200,1000);
					mainPanel.add(imgBackground);

					loginFrame.dispose();
				}
				else{
					lblTitleLogin.setText("INCORRECT. TRY AGAIN.");
					lblTitleLogin.setForeground(Color.red);
					txtPassword.setBackground(Color.RED);
					txtUserName.setBackground(Color.red);
				}
			}	
		});
	}
	public void addJTextFields(){
		//id is 2517
		txtUserName = new JTextField("Your ID?");
		txtUserName.setFont(new Font("Helvetica",Font.PLAIN,20));
		txtUserName.setHorizontalAlignment(JTextField.CENTER);
		txtUserName.setForeground(Color.black);
		txtUserName.setBounds(500,500, 250, 50);
		loginPanel.add(txtUserName);

	}
	public void addJPasswordFields(){
		//pass is 'demo'
		txtPassword = new JPasswordField("...?",4);
		txtPassword.setFont(new Font("Helvetica",Font.PLAIN,20));
		txtPassword.setHorizontalAlignment(JTextField.CENTER);
		txtPassword.setForeground(Color.black);
		txtPassword.setBounds(500,600, 250, 50);
		loginPanel.add(txtPassword);
	}
	public void addBackgroundLogin(){
		imgBackground = new JLabel(imgBackgroundIcon);
		imgBackground.setBounds(0,0,1200,1000);
		loginPanel.add(imgBackground);
	}
	public void configLoginFrame(){
		loginFrame.add(loginPanel);
		loginFrame.setVisible(true);
	}
}