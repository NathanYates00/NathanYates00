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
    public partial class options : Form
    {
        public static string jumperSkin, gameDifficulty;
        public static int background, randomSkin, randomBackground, randomDifficulty;
        Random random = new Random();

        public options()
        {
            InitializeComponent();
        }

        private void options_Load(object sender, EventArgs e) // Sets images to default.
        {
            jumperPicture.Image = (Image)GameOptions.NewJumperSkin;
            BackgroundImage = (Image)GameOptions.NewBackground;
        }


        private void ExitBtn_MouseHover(object sender, EventArgs e) // When cursor is moved onto the exit button.
        {
            this.exitBtn.BackColor = Color.Red;
            this.exitBtn.ForeColor = Color.Black;
        }

        private void ExitBtn_MouseLeave(object sender, EventArgs e) // When cursor is moved off the exit button.
        {
            this.exitBtn.BackColor = Color.DarkRed;
            this.exitBtn.ForeColor = Color.White;
        }

        private void ExitBtn_Click(object sender, EventArgs e) // Exits to menu.
        {
            menu menuScreen = new menu();
            menuScreen.Show();
            this.Hide();
        }

        public void ChipRadio_CheckedChanged(object sender, EventArgs e)
        {
            jumperPicture.Image = Properties.Resources.chip;
            jumperSkin = "chip";
        }

        public void BertRadio_CheckedChanged(object sender, EventArgs e)
        {
            jumperPicture.Image = Properties.Resources.bert;
            jumperSkin = "bert";
        }

        public void RunnerRadio_CheckedChanged(object sender, EventArgs e)
        {
            jumperPicture.Image = Properties.Resources.runner;
            jumperSkin = "runner";
        }

        public void HotdogRadio_CheckedChanged(object sender, EventArgs e)
        {
            jumperPicture.Image = Properties.Resources.hotdog;
            jumperSkin = "hotdog";
        }

        public void SallyRadio_CheckedChanged(object sender, EventArgs e)
        {
            jumperPicture.Image = Properties.Resources.sally;
            jumperSkin = "sally";
        }

        public void GrettaRadio_CheckedChanged(object sender, EventArgs e)
        {
            jumperPicture.Image = Properties.Resources.gretta;
            jumperSkin = "gretta";
        }


        private void Background1RadioBtn_CheckedChanged(object sender, EventArgs e)
        {
            BackgroundImage = Properties.Resources.background1;
            background = 1;
        }

        private void Background2RadioBtn_CheckedChanged(object sender, EventArgs e)
        {
            BackgroundImage = Properties.Resources.background2;
            background = 2;
        }

        private void Background3RadioBtn_CheckedChanged(object sender, EventArgs e)
        {
            BackgroundImage = Properties.Resources.background3;
            background = 3;
        }

        private void easyDifRadio_CheckedChanged(object sender, EventArgs e)
        {
            gameDifficulty = "easy";
        }

        private void normalDifRadio_CheckedChanged(object sender, EventArgs e)
        {
            gameDifficulty = "normal";
        }

        private void hardDifRadio_CheckedChanged(object sender, EventArgs e)
        {
            gameDifficulty = "hard";
        }

        private void insaneDifRadio_CheckedChanged(object sender, EventArgs e)
        {
            gameDifficulty = "insane";
        }

        private void randomiseBtn_Click(object sender, EventArgs e)
        {
            randomSkin = random.Next(1, 6); // Picks a number between one and six, sets the randomSkin to this number.
            randomBackground = random.Next(1, 3);
            randomDifficulty = random.Next(1, 4);

            switch (randomSkin) // Changes the skin of the jumper at random.
            {
                case 1:
                    jumperPicture.Image = Properties.Resources.chip;
                    jumperSkin = "chip";
                    break;

                case 2:
                    jumperPicture.Image = Properties.Resources.bert;
                    jumperSkin = "bert";
                    break;

                case 3:
                    jumperPicture.Image = Properties.Resources.runner;
                    jumperSkin = "runner";
                    break;

                case 4:
                    jumperPicture.Image = Properties.Resources.hotdog;
                    jumperSkin = "hotdog";
                    break;

                case 5:
                    jumperPicture.Image = Properties.Resources.sally;
                    jumperSkin = "sally";
                    break;

                case 6:
                    jumperPicture.Image = Properties.Resources.gretta;
                    jumperSkin = "gretta";
                    break;
            }

            switch (randomBackground) // Changes the background at random.
            {
                case 1:
                    BackgroundImage = Properties.Resources.background1;
                    background = 1;
                    break;

                case 2:
                    BackgroundImage = Properties.Resources.background2;
                    background = 2;
                    break;

                case 3:
                    BackgroundImage = Properties.Resources.background3;
                    background = 3;
                    break;
            }

            switch (randomDifficulty) // Changes the game difficulty at random.
            {
                case 1:
                    gameDifficulty = "easy";
                    break;

                case 2:
                    gameDifficulty = "normal";
                    break;

                case 3:
                    gameDifficulty = "hard";
                    break;

                case 4:
                    gameDifficulty = "insane";
                    break;
            }

            // Sends the random jumper skin, background and difficulty to the other forms.
            GameOptions.NewJumperSkin = jumperSkin;
            GameOptions.NewBackground = background;
            GameOptions.NewGameDifficulty = gameDifficulty;
        }

        private void ChangeBtn_Click(object sender, EventArgs e) // Sends the chosen jumper skin,
                                                                 // background and difficulty to the other forms.
        {
            GameOptions.NewJumperSkin = jumperSkin;
            GameOptions.NewBackground = background;
            GameOptions.NewGameDifficulty = gameDifficulty;
        }      
    }
}
