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
    public partial class game : Form
    {
        public static string jumperSkin, timeAlive, coinsCollected, gameDifficulty;
        public static int background, catSpeed, posionSpeed;
        Random random = new Random(); // Random element helped with this website.
                                      // https://docs.microsoft.com/en-us/dotnet/api/system.random?view=net-6.0


        public game() // The game idea was influenced by a YouTube playlist I came across.
                      // https://www.youtube.com/playlist?list=PLgpnJydBcnPBZaF6L6oHd6TU8QTmUbkVO
        {
            InitializeComponent();
        }


        private void game_Load(object sender, EventArgs e) // Start the timers, update jumper, background images and the difficulty to those chosen in options
        {
            aliveTimer.Enabled = true;
            objTimer.Enabled = true;

            jumperPicture.Image = (Image)GameOptions.NewJumperSkin;
            BackgroundImage = (Image)GameOptions.NewBackground;
            lblGameDifficulty.Text = GameOptions.NewGameDifficulty;
            gameDifficulty = GameOptions.NewGameDifficulty;
        }


        private void aliveTimer_Tick(object sender, EventArgs e) // Add one second to time alive counter for each second that passes
        {
            lblTimeAlive.Text = (int.Parse(lblTimeAlive.Text) + 1).ToString();
            timeAlive = lblTimeAlive.Text;
        }


        private void objTimer_Tick(object sender, EventArgs e) // Speed of the objects per second
        {
            switch(gameDifficulty) // Changes the speed of poison and cat depending on which difficulty they choose.
            {
                case "Easy":
                    posionSpeed = 7;
                    catSpeed = 9;
                    lblCoinsRequired.Text = "5";
                    break;

                case "Normal":
                    posionSpeed = 8;
                    catSpeed = 10;
                    lblCoinsRequired.Text = "10";
                    break;

                case "Hard":
                    posionSpeed = 12;
                    catSpeed = 15;
                    lblCoinsRequired.Text = "12";
                    break;

                case "Insane":
                    posionSpeed = 16;
                    catSpeed = 20;
                    lblCoinsRequired.Text = "15";
                    break;
            }
            this.posion.Left -= posionSpeed;
            this.cat.Left -= catSpeed;
            this.coin.Left -= random.Next(7, 14); // Coin speed is random, differs each timer tick


            if (this.coin.Bounds.IntersectsWith(jumperPicture.Bounds)) // If the jumper touches the coin then add a coin to the counter,
                                                                       // and return coin to a random spawn on X axis
            {
                lblCoinCount.Text = (int.Parse(lblCoinCount.Text) + 1).ToString();
                this.coin.Left =  random.Next(700, 1400); // Random spawn from 700px to 1400px X axis, adds randomness to the game
                coinsCollected = lblCoinCount.Text;
            }
                
            if (this.cat.Bounds.IntersectsWith(jumperPicture.Bounds) || (this.posion.Bounds.IntersectsWith(jumperPicture.Bounds)))
            {
                gameLost(); // If cat or posion cloud collide with jumper, the game ends           
            }

            if (this.cat.Left < -147) // If cat goes out of the form view, return to spawn position
            {
                this.cat.Left = 800;
            }

            if (this.posion.Left < -147) // If poison cloud goes out of the form view, return to spawn position
            {
                this.posion.Left = 1400;
            }

            if (gameDifficulty == "Easy" && lblCoinCount.Text == "5") // Game won if 5 coins are collected
            {
                gameWon();
            }

            else if (gameDifficulty == "Normal" && lblCoinCount.Text == "10") // Game won if 10 coins are collected
            {
                gameWon();
            }

            else if (gameDifficulty == "Hard" && lblCoinCount.Text == "12") // Game won if 12 coins are collected
            {
                gameWon();
            }

            else if (gameDifficulty == "Insane" && lblCoinCount.Text == "15") // Game won if 15 coins are collected
            {
                gameWon();
            }
        }

        private void gameStatistics() // Updates the coins collected and time alive within the game
        {
            GameStats.UpdatedCoins = coinsCollected;
            GameStats.UpdatedTimeAlive = timeAlive;
        }

        private void gameLost() // Game ends, opens lose screen, closes game screen. Stops both timers.
        {
            gameStatistics();
            loseScreen gameLost = new loseScreen();
            gameLost.Show();
            this.Hide();
            objTimer.Stop();
            aliveTimer.Stop();
        }
        private void gameWon() // Game ends, opens win screen, closes game screen. Stops both timers.
        {
            gameStatistics();
            winScreen gameWon = new winScreen();
            gameWon.Show();
            this.Hide();
            objTimer.Stop();
            aliveTimer.Stop();
        }



        private void game_KeyPress(object sender, KeyPressEventArgs e)
        {
            if (e.KeyChar == 'w' || e.KeyChar == 'W') // When W key (capital or lower-case) is pressed, move jumper up
            {
                this.jumperPicture.Top = 110;
            }

            else if (e.KeyChar == 's' || e.KeyChar == 'S') // When S key (capital or lower-case) is pressed, move jumper down
            {
                this.jumperPicture.Top = 208;
            }
        }
    }
}
