using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Assignment_One___OOP___Nathan_Yates
{
    public partial class instructions : Form
    {
        public static string jumperSkin;
        public static int background;

        public instructions()
        {
            InitializeComponent();
        }
        
        private void exitBtn_MouseHover(object sender, EventArgs e)
        {
            this.exitBtn.BackColor = Color.Red;
            this.exitBtn.ForeColor = Color.Black;
        }

        private void exitBtn_MouseLeave(object sender, EventArgs e)
        {
            this.exitBtn.BackColor = Color.DarkRed;
            this.exitBtn.ForeColor = Color.White;
        }

        private void exitBtn_Click(object sender, EventArgs e) // Exits to menu.
        {
            menu menuScreen = new menu();
            menuScreen.Show();
            this.Hide();
        }

        private void instructions_Load(object sender, EventArgs e) // Updates the jumper and background image to what was chosen in the options.
        {
            jumperPicture.Image = (Image)GameOptions.NewJumperSkin;
            BackgroundImage = (Image)GameOptions.NewBackground;
        }
    }
}
