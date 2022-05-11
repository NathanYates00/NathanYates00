using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Assignment_One___OOP___Nathan_Yates
{
    public class GameOptions
    {
        private static object newJumperSkin;
        public static object NewJumperSkin
        {
            get // With help from https://www.w3schools.com/cs/cs_properties.php to better understand get and set.
            {
                switch (newJumperSkin) // Changes the skin of the jumper depending on which character they choose.
                {
                    case "chip":
                        return Properties.Resources.chip;

                    case "bert":
                        return Properties.Resources.bert;

                    case "runner":
                        return Properties.Resources.runner;

                    case "hotdog":
                        return Properties.Resources.hotdog;

                    case "sally":
                        return Properties.Resources.sally;

                    case "gretta":
                        return Properties.Resources.gretta;

                    default: // Needs to be present otherwise when first starting the game,
                             // there would not be any jumper present in any forms before altering options.
                        return Properties.Resources.chip;

                }
            }
            set
            {
                newJumperSkin = value;
            }

        }

        private static object newBackground;
        public static object NewBackground
        {
            get
            {
                switch (newBackground) // Changes the background of the game depending on which background they choose.
                {
                    case 1:
                        return Properties.Resources.background1;

                    case 2:
                        return Properties.Resources.background2;

                    case 3:
                        return Properties.Resources.background3;

                    default: // Needs to be present otherwise when first starting the game,
                             // there would not be any game background present in any forms before altering options.
                        return Properties.Resources.background1;
                }
            }
            set
            {
                newBackground = value;
            }

        }

        private static string newGameDifficulty;
        public static string NewGameDifficulty
        {
            get
            {
                switch (newGameDifficulty) // Changes the difficulty of the game depending on which difficulty they choose.
                {
                    case "easy":
                        return "Easy";

                    case "normal":
                        return "Normal";

                    case "hard":
                        return "Hard";

                    case "insane":
                        return "Insane";

                    default: // Needs to be present otherwise when first starting the game,
                             // there would not be any game difficulty present before altering options.
                        return "Normal";
                }
            }
            set
            {
                newGameDifficulty = value;
            }

        }
    }
}

    


