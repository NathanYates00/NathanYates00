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
    public partial class menu : Form
    {
        public static string jumperSkin;
        public static int background;

        public menu()
        {
            InitializeComponent();
        }

        private void gameBtn_MouseHover(object sender, EventArgs e) // When cursor is moved onto the play game button.
        {
            this.gameBtn.BackColor = Color.DarkCyan;
        }

        private void gameBtn_MouseLeave(object sender, EventArgs e) // When cursor is moved off the play game button.
        {
            this.gameBtn.BackColor = Color.DarkGreen;
        }

        private void instructionsBtn_MouseHover(object sender, EventArgs e)
        {
            this.instructionsBtn.BackColor = Color.DarkCyan;
        }

        private void instructionsBtn_MouseLeave(object sender, EventArgs e)
        {
            this.instructionsBtn.BackColor = Color.DarkGreen;
        }

        private void optionsBtn_MouseHover(object sender, EventArgs e)
        {
            this.optionsBtn.BackColor = Color.DarkCyan;
        }

        private void optionsBtn_MouseLeave(object sender, EventArgs e)
        {
            this.optionsBtn.BackColor = Color.DarkGreen;
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

        private void exitBtn_Click(object sender, EventArgs e) // When the exit button is clicked, asks the user if they are sure that they wish to exit the program.
        {
            DialogResult exitAns = MessageBox.Show("Are you sure you \n wish to exit?", "Exit?", MessageBoxButtons.YesNo, MessageBoxIcon.Question);
            if (exitAns == DialogResult.Yes)
            { 
                Application.Exit();
            }
        }

        private void gameBtn_Click(object sender, EventArgs e) // Opens game screen, closes menu.
        {
            game gameScreen = new game();
            gameScreen.Show();
            this.Hide();
        }

        private void instructionsBtn_Click(object sender, EventArgs e) // Opens instructions screen, closes menu.
        {
            instructions instructionsScreen = new instructions();
            instructionsScreen.Show();
            this.Hide();
        }

        private void optionsBtn_Click(object sender, EventArgs e) // Opens options screen, closes menu.
        {
            options optionsScreen = new options();
            optionsScreen.Show();
            this.Hide();
        }


        private void menu_Load(object sender, EventArgs e) // Updates the jumper and background image to what was chosen in the options.
        {
            jumperPicture.Image = (Image)GameOptions.NewJumperSkin;
            BackgroundImage = (Image)GameOptions.NewBackground;
        }
    }
}
