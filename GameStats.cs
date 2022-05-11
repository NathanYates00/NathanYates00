using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Assignment_One___OOP___Nathan_Yates
{
    class GameStats
    {
        private static string updatedCoins;
        public static string UpdatedCoins
        {
            get // This updates the coins collected from the game, to be shown on both the win and lose screens.
            {
                return updatedCoins;
            }
            set
            {
                updatedCoins = value;
            }

        }

        private static string updatedTimeAlive;
        public static string UpdatedTimeAlive
        {
            get // This updates the time alive in the game, to be shown on both the win and lose screens.
            {
                return updatedTimeAlive;
            }
            set
            {
                updatedTimeAlive = value;
            }
        }
    }
}
