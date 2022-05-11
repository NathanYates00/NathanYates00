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
    public partial class checkTourDate : Form
    {
        public checkTourDate()
        {
            InitializeComponent();
        }

        Bookings objBooking;
        Customer objCustomer;
        DataSet dsBooking, dsCustomer;
        DataRow drBooking, drCustomer;
        
        private void btnGetBookingDetails_Click(object sender, EventArgs e)
        {
            // Try catch to ensure the tourdate and cabintype input exists
            try
            {
                // Gets the DataSet of the booking, selected by the given tourdate and cabintype
                objBooking = new Bookings();
                dsBooking = objBooking.GetBookingByTourDateAndCabinType(DateTime.Parse(inputTourDate.Text), inputCabinType.Text);

                // Start at the first row, located at row 0
                drBooking = dsBooking.Tables[0].Rows[0];

                // Displays the amount of bookings for the specified cabin type
                txtAmountBooked.Text = dsBooking.Tables[0].Rows.Count.ToString();

                switch (inputCabinType.Text)
                {
                    case "Penthouse":
                        txtAmountAvailable.Text = "1";
                        break;

                    case "Luxury":
                        txtAmountAvailable.Text = "2";
                        break;

                    case "Standard":
                        txtAmountAvailable.Text = "5";
                        break;

                    case "Budget":
                        txtAmountAvailable.Text = "8";
                        break;
                }

                // Bind data to DataGridView
                dataGridViewBooking.DataSource = dsBooking.Tables[0];

                // Display data for current row
                DisplayBookingData();
            }
            catch (Exception error)
            {
                // Messagebox to user if they input non-existing booking details, without crashing the program
                DialogResult wrongInput = MessageBox.Show("No data found, please input an existing tour date and cabin type." +
                    "\nDo you want to see more information?", "Confirm", MessageBoxButtons.YesNo);

                // If the user says yes for more information
                if (wrongInput == DialogResult.Yes)
                {
                    // Long error message output into a seperate messagebox
                    MessageBox.Show(error.ToString());
                }
            }
        }

        private void DisplayBookingData()
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
                DisplayBookingData();
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

        private void btnGetCustomerDetails_Click(object sender, EventArgs e)
        {
            // Gets the DataSet of the customer, selected by the given Email
            objCustomer = new Customer();
            dsCustomer = objCustomer.GetCustomerByEmail(txtEmail.Text);

            // Start at the first row, located at row 0
            drCustomer = dsCustomer.Tables[0].Rows[0];

            //Display data for current row
            DisplayCustomerData();
        }

        private void DisplayCustomerData()
        {
            // Display the selected details
            fieldCustomerID.Text = drCustomer[0].ToString();
            fieldFirstName.Text = drCustomer[1].ToString();
            fieldSurname.Text = drCustomer[2].ToString();
            fieldDOB.Text = drCustomer[3].ToString();
            fieldSex.Text = drCustomer[4].ToString();
            fieldAddress.Text = drCustomer[5].ToString();
            fieldTown.Text = drCustomer[6].ToString();
            fieldPostCode.Text = drCustomer[7].ToString();
            fieldPhone.Text = drCustomer[8].ToString();
            fieldEmail.Text = drCustomer[9].ToString();
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
