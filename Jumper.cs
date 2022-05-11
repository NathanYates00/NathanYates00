using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Assignment_One___OOP___Nathan_Yates
{
    public class Jumper
    {
        public static string jumperSkin;
        public void updateSkin()
        {

            switch (jumperSkin)
            {
                case "chip":
                    
                   // jumperPicture.Image = Properties.Resources.chip;
                    break;

                case "bert":
                  //  jumperPicture.Image = Properties.Resources.bert;
                    break;

                case "runner":
                //    jumperPicture.Image = Properties.Resources.runner;
                    break;

                case "hotdog":
                   // jumperPicture.Image = Properties.Resources.hotdog;
                    break;

                case "sally":
                  //  jumperPicture.Image = Properties.Resources.sally;
                    break;

                case "gretta":
                  //  jumperPicture.Image = Properties.Resources.gretta;
                    break;
            }
        }
    }
}

    


