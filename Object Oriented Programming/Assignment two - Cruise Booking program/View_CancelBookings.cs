using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Globalization;

namespace Assignment2___BookACruise___NathanYates
{
    public partial class View_CancelBookings : Form
    {
        public View_CancelBookings()
        {
            InitializeComponent();
        }

        Bookings objBooking;
        DataSet dsBooking;
        DataRow drBooking;

        decimal penthousePrice = 785, luxuryPrice = 565, standardPrice = 450, budgetPrice = 350;

        private void btnGetDetails_Click(object sender, EventArgs e)
        {
            // Try catch to ensure the email input is existing
            try
            {
                // Gets the DataSet of the booking, selected by the given Email
                objBooking = new Bookings();
                dsBooking = objBooking.GetBookingByEmail(fieldCustomerEmail.Text);

                // Start at the first row, located at row 0
                drBooking = dsBooking.Tables[0].Rows[0];

                //Bind data to DataGridView
                dataGridViewBooking.DataSource = dsBooking.Tables[0];

                //Display data for current row
                DisplayData();

                // Enables the update buttons
                btnUpdateBooking.Enabled = true;
                btnUpdateDatabase.Enabled = true;
            }
            catch (Exception error)
            {
                // Messagebox to user if they input a non-existing email, without crashing the program
                DialogResult wrongEmail = MessageBox.Show("No data found, please input an existing email." +
                    "\nDo you want to see more information?", "Confirm", MessageBoxButtons.YesNo);

                // If the user says yes for more information
                if (wrongEmail == DialogResult.Yes)
                {
                    // Long error message output into a seperate messagebox
                    MessageBox.Show(error.ToString());
                }
            }
        }

        private void DisplayData()
        {
            // Display the selected details
            txtBookingID.Text = drBooking[0].ToString();
            txtCustomerID.Text = drBooking[1].ToString();
            cmbTourDate.Text = drBooking[2].ToString();
            cmbCabinType.Text = drBooking[3].ToString();
            txtNoOfOccupants.Text = drBooking[4].ToString();
            txtPrice.Text = drBooking[5].ToString();
            txtEmail.Text = drBooking[6].ToString();
        }

        private void dataGridViewBooking_MouseClick(object sender, MouseEventArgs e)
        {
            try
            {
                // Stores the row number of the selected row
                int CurrentRowIndex = dataGridViewBooking.CurrentRow.Index;

                // Gets the row at the position in the dataset determined by the row selected on the DataGridView
                drBooking = dsBooking.Tables[0].Rows[CurrentRowIndex];

                // Redisplay the selected row's data
                DisplayData();
            }

            catch (Exception error)
            {
                // Messagebox to user if they click on an area that has no data, without crashing the program
                DialogResult noData = MessageBox.Show("No data found." +
                    "\nDo you want to see more information?", "Confirm", MessageBoxButtons.YesNo);

                // If the user says yes for more information
                if (noData == DialogResult.Yes)
                {
                    // Long error message output into a seperate messagebox
                    MessageBox.Show(error.ToString());
                }
            }
        }

        // Used to get the price from based on the cabin type and number of occupants
        private void btnGetPrice_Click(object sender, EventArgs e)
        {
            switch (cmbCabinType.Text)
            {
                case "Penthouse":
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

        private void btnUpdateBooking_Click(object sender, EventArgs e)
        {
            // Created an object instance of the Bookings class
            Bookings bookings = new Bookings();

            // Gets the DataSet of the booking, selected by the given tour date and cabin type
            DataSet bookingData = bookings.GetBookingByTourDateAndCabinType
                (DateTime.Parse(cmbTourDate.Text), cmbCabinType.Text);

            int amountBooked;

            // If there are results from the select statement
            if (bookingData != null)
            {
                amountBooked = int.Parse(bookingData.Tables[0].Rows.Count.ToString());
            }

            // If the results were empty
            else
            {
                amountBooked = 0;
            }

            int amountAvailable = 0;

            // Assigns amountAvailable to an int dependant on what the user inputted for cabintype
            switch (cmbCabinType.Text)
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
                // Update the customer details
                drBooking[0] = txtBookingID.Text;
                drBooking[1] = txtCustomerID.Text;
                drBooking[2] = cmbTourDate.Text;
                drBooking[3] = cmbCabinType.Text;
                drBooking[4] = txtNoOfOccupants.Text;
                drBooking[5] = txtPrice.Text;
                drBooking[6] = txtEmail.Text;
                dataGridViewBooking.Refresh();
                MessageBox.Show("Booking updated", "Updated");
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

        private void btnUpdateDatabase_Click(object sender, EventArgs e)
        {
            // Update the database
            objBooking.UpdateBooking(dsBooking);
            MessageBox.Show("Database updated", "Updated");
        }

        private void btnCancelBooking_Click(object sender, EventArgs e)
        {
            // Gets todays date, help from: https://www.c-sharpcorner.com/blogs/current-date-and-time-in-c-sharp
            DateTime Today = DateTime.Now;

            // Sets the booking date to the tourdate variable
            DateTime TourDate = DateTime.Parse(cmbTourDate.Text);

            // Finds the amount of days are between now to the booked date, + 2 to include today and the actual tourdate
            // Help with Tourdate - today from: https://stackoverflow.com/questions/1607336/calculate-difference-between-two-dates-number-of-days
            int DaysTillTour = (int)(TourDate - Today).TotalDays + 2;

            if (DaysTillTour >= 10)
            {
                objBooking.CancelBooking(txtBookingID.Text);
                decimal price = decimal.Parse(txtPrice.Text);
                // This is to show to the user that the price has been reduced by 50%, rounded to 2 decimal places.
                string refundPrice = Math.Round((price * 0.5m), 2).ToString();
                MessageBox.Show("Booking cancelled, £" + refundPrice + " has been refunded to " + txtEmail.Text, "Booking cancelled");
            }
            else
            {
                MessageBox.Show("Booking cannot be cancelled, the tour is in " +
                 DaysTillTour + " days, and so is too late to be cancelled.", "Too close to Tour date");
            }
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
}
