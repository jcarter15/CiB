import com.teamdev.jxbrowser.chromium.Browser;
import com.teamdev.jxbrowser.chromium.swing.BrowserView;
import javax.swing.*;
import java.awt.*;
/**
 * Author: [TEAM 8 of BOURNEMOUTH UNIVERSITY]
 * Date began: [08/05/17]
 * Description: [This is a web DESKTOP app for KINGFISHER IT TIMESHEET]
 * Created for: [Computing in Bournemouth week 2017 - KITS]
 */
public class timeKeepingApplication {
	static Image clockIcon = Toolkit.getDefaultToolkit().getImage("clock-icon.png");
	public static void main(String[] args) {
		Browser browser = new Browser();
		BrowserView browserView = new BrowserView(browser);
		JFrame frame = new JFrame();
		frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		frame.setIconImage(clockIcon); 
		frame.setTitle("KINGFISHER IT TIMEKEEPING");
		frame.setExtendedState(JFrame.MAXIMIZED_BOTH);
		frame.setResizable(false); 
		frame.add(browserView, BorderLayout.CENTER);
		frame.setSize(1000, 1000);
		frame.setLocationRelativeTo(null);
		frame.setVisible(true);
		browser.loadURL("http://albavicius.com/cib_group_8/index.php?page=login");
	}
}