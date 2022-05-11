using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Assignment2___BookACruise___NathanYates
{
    public partial class AddBooking : Form
    {
        public AddBooking()
        {
            InitializeComponent();
        }

        DataSet dsBooking;

        // Set cabin type prices, but not set discounted cabin prices, explained why below in the switch statement.
        decimal penthousePrice = 785, luxuryPrice = 565, standardPrice = 450, budgetPrice = 350;

        // Used to get the customerID from the given email
        private void btnGetCustomerID_Click(object sender, EventArgs e)
        {           
            // Created an object instance of the Bookings class
            Bookings bookings = new Bookings();

            // Sets the email as the inputted email
            bookings.Email = txtEmail.Text;

            // Calls the GetCustomerIDFromEmail method
            bookings.GetCustomerIDFromEmail();

            // Adds the Customer ID from the Customer table
            txtCustomerID.Text = bookings.CustomerID.ToString();                      
        }

        // Used to get the price from based on the cabin type and number of occupants
        private void btnGetTotalPrice_Click(object sender, EventArgs e)
        {
            switch (cmbCabinType.Text) 
            {
                case "Penthouse":
                    // If penthouse and 1 occupant, then get the 20% discounted price.
                    // It was done as * 0.8 instead of a set discounted price, so if the cruise
                    // decided they want to make the regular price £600 instead of £785 then the
                    // discounted price did not need to be altered too.
                    if (txtNoOfOccupants.Text == "1")
                    {
                        txtPrice.Text = (penthousePrice * 0.8m).ToString();
                    }
                    else
                    {
                        txtPrice.Text = penthousePrice.ToString();
                    }
                    break;

                case "Luxury":
                    if (txtNoOfOccupants.Text == "1")
                    {
                        txtPrice.Text = (luxuryPrice * 0.82m).ToString();
                    }
                    else
                    {
                        txtPrice.Text = luxuryPrice.ToString();
                    }
                    break;

                case "Standard":
                    if (txtNoOfOccupants.Text == "1")
                    {
                        txtPrice.Text = (standardPrice * 0.85m).ToString();
                    }
                    else
                    {
                        txtPrice.Text = standardPrice.ToString();
                    }
                    break;

                case "Budget":
                    if (txtNoOfOccupants.Text == "1")
                    {
                        txtPrice.Text = (budgetPrice * 0.9m).ToString();
                    }
                    else
                    {
                        txtPrice.Text = budgetPrice.ToString();
                    }
                    break;
            }
        }

        private void btnCreateBooking_Click(object sender, EventArgs e)
        {
            //Try catch to ensure all fields are entered into, and that the number of occupants is not a string value
            try
            {
                // Created an object instance of the Bookings class
                Bookings bookings = new Bookings();

                // Sets the booking details as the inputted data from the fields
                bookings.Email = txtEmail.Text;
                bookings.CustomerID = int.Parse(txtCustomerID.Text.ToString());

                // Same again as the customers DOB, I kept it as this system which should work as intended
                // As long as your computer uses the UK date format (dd/MM/yyyy).
                bookings.TourDate = DateTime.Parse(cmbTourDate.Text);
                bookings.CabinType = cmbCabinType.Text;
                bookings.NumberOfOccupants = int.Parse(txtNoOfOccupants.Text.ToString());
                bookings.Price = decimal.Parse(txtPrice.Text.ToString());

                // Gets the DataSet of the booking, selected by the given tour date and cabin type
                dsBooking = bookings.GetBookingByTourDateAndCabinType
                    (DateTime.Parse(bookings.TourDate.ToString()), bookings.CabinType);

                int amountBooked;

                // If there are results from the select statement
                if (dsBooking != null)
                {
                    amountBooked = int.Parse(dsBooking.Tables[0].Rows.Count.ToString());
                }

                // If the results were empty
                else
                {
                    amountBooked = 0;
                }

                int amountAvailable = 0;

                // Assigns amountAvailable to an int dependant on what the user inputted for cabintype
                switch (bookings.CabinType)
                {
                    case "Penthouse":
                        amountAvailable = 1;
                        break;

                    case "Luxury":
                        amountAvailable = 2;
                        break;

                    case "Standard":
                        amountAvailable = 5;
                        break;

                    case "Budget":
                        amountAvailable = 8;
                        break;
                }

                // If the number of cabins booked on the specified tour date is less than the amount of cabins available.
                if (amountBooked < amountAvailable)
                {
                    // Calls the AddNewBooking method
                    bookings.AddNewBooking();

                    // Adds the Booking ID from the Bookings table, auto incrementing
                    txtBookingID.Text = bookings.BookingID.ToString();

                    decimal price = decimal.Parse(txtPrice.Text);
                    // This is to show to the user the price rounded to 2 decimal places.
                    string Price = Math.Round(price, 2).ToString();

                    // Show once booking has been complete
                    DialogResult completedBooking = MessageBox.Show("Booking has been completed." +
                        "\nThe customer has now been charged £" + Price + " for their room." +
                        "\nA receipt of this booking has been sent to " + bookings.Email
                        , "Thank you for booking", MessageBoxButtons.OK);

                    // If the user clicks ok
                    if (completedBooking == DialogResult.OK)
                    {
                        // Clears the details ready for the next booking.
                        btnClearAdd_Click(sender, e);
                    }
                }
                else
                {
                    // Show if the cabin type for the tourdate is equal to how many are available
                    // For example, available Penthouse cabins = 1, and the cabin has already been booked.
                    MessageBox.Show("Sorry, there are already" +
                        " too many bookings for this cabin type on this tour date," +
                        " please try a different cabin type or a different tour date."
                        , "Cannot complete booking");
                }
            }
            catch (Exception error)
            {
                // Messagebox to remind the user that all fields need to be entered into,
                // or that the number of occupants has been entered wrong, without crashing the program
                DialogResult usedString = MessageBox.Show("Please enter into all detail fields. " +
                    "Please also ensure the number of occupants is a number value." +
                    "\nDo you want to see more information?", "Confirm", MessageBoxButtons.YesNo);

                // If the user says yes for more information
                if (usedString == DialogResult.Yes)
                {
                    // Long error message output into a seperate messagebox
                    MessageBox.Show(error.ToString());
                }
            }
        }

        private void btnClearAdd_Click(object sender, EventArgs e)
        {
            // Clears all the text boxes
            txtBookingID.Clear();
            txtCustomerID.Clear();
            cmbTourDate.ResetText();
            cmbCabinType.ResetText();
            txtNoOfOccupants.Clear();
            txtPrice.Clear();
            txtEmail.Clear();
        }

        private void btnExit_Click(object sender, EventArgs e)
        {
            MainMenu menuScreen = new MainMenu();
            menuScreen.Show();
            this.Hide();
        }

        private void btnExit_MouseHover(object sender, EventArgs e)
        {
            this.btnExit.BackColor = Color.Red;
            this.btnExit.ForeColor = Color.Black;
        }

        private void btnExit_MouseLeave(object sender, EventArgs e)
        {
            this.btnExit.BackColor = Color.DarkRed;
            this.btnExit.ForeColor = Color.White;
        }   
    }

    // Budget room photo link: https://www.cruisecritic.co.uk/articles.cfm?ID=2557&stay=1&posfrom=1
    // Standard room photo link: https://www.mundycruising.co.uk/cruise-news/cruise-advice/cruise-ship-cabin-sizes-guide
    // Luxury room photo link: https://edition.cnn.com/travel/article/cruise-ships-luxury-suites/index.html
    // Penthouse room photo link: https://www.thetravelmagazine.net/most-expensive-cruise-ship-suite.html
}
