import javax.swing.*;
public class DisplayLabel extends JFrame 
{
	public DisplayLabel() {
		add(new JLabel("Great!", JLabel.CENTER));
	}
	public static void main(String[] args) 
	{
		JFrame frame = new DisplayLabel();
		frame.setTitle("DisplayLabel");
		frame.setSize(200, 100);
		frame.setLocationRelativeTo(null);
		frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		frame.setVisible(true);
	}
}
