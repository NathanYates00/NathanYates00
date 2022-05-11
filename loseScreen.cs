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
    public partial class loseScreen : Form
    {
        public loseScreen()
        {
            InitializeComponent();
        }

        private void loseScreen_Load(object sender, EventArgs e) // Updates jumper, background images, and displays the coin count, time alive and game difficulty
        {            
            jumperPicture.Image = (Image)GameOptions.NewJumperSkin;
            BackgroundImage = (Image)GameOptions.NewBackground;
            lblCoinCount.Text = GameStats.UpdatedCoins;
            lblTimeAlive.Text = GameStats.UpdatedTimeAlive;
            lblGameDifficulty.Text = GameOptions.NewGameDifficulty;
        }

        private void gameBtn_MouseHover(object sender, EventArgs e)
        {
            this.gameBtn.BackColor = Color.DarkCyan;
        }

        private void gameBtn_MouseLeave(object sender, EventArgs e)
        {
            this.gameBtn.BackColor = Color.DarkGreen;
        }

        private void gameBtn_Click(object sender, EventArgs e) // Opens game screen, closes lose screen.
        {
            game gameScreen = new game();
            gameScreen.Show();
            this.Hide();
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

        private void exitBtn_Click(object sender, EventArgs e) // Opens menu screen, closes lose screen.
        {
            menu menuScreen = new menu();
            menuScreen.Show();
            this.Hide();
        }
    }
}
