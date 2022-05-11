using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

// Add the extra using statements
using System.Data.SqlClient;
using System.Configuration;

namespace Assignment2___BookACruise___NathanYates
{
    public partial class Add_ViewCustomer : Form
    {
        public Add_ViewCustomer()
        {
            InitializeComponent();
        }

        Customer objCustomer;
        DataSet dsCustomer;
        DataRow drCustomer;

        private void btnAddCustomer_Click(object sender, EventArgs e)
        {
            // Try catch to ensure all fields are entered into, and that the dob is not incorrectly entered
            try
            {
                // Created an object instance of the Customer class
                Customer customer = new Customer();
                
                // Sets the customer details as the inputted data from the fields
                customer.FirstName = txtFirstName.Text;
                customer.Surname = txtSurname.Text;

                // I did try to fix the issue of including computers that use the American format
                // of dates (MM/dd/yyyy) but it would not work, so I have reverted back to this method
                // Which uses the UK format (dd/MM/yyyy), hopefully this works on your computer
                // as it works perfectly on mine.
                // (Example - Users DOB = 24/08/1995 - This would not work on a
                // computer using the American format)
                customer.DOB = DateTime.Parse(txtDOB.Text);
                customer.Sex = cmbSex.Text;
                customer.Address = txtAddress.Text;
                customer.Town = txtTown.Text;
                customer.PostCode = txtPostCode.Text;
                customer.Phone = txtPhone.Text;
                customer.Email = txtEmail.Text;

                // Get and open a connection
                string DataConnectionString = ConfigurationManager.ConnectionStrings["LinkToData"].ConnectionString;
                SqlConnection cnData = new SqlConnection(DataConnectionString);
                cnData.Open();

                // Set up the Command and DataAdapter
                SqlCommand cmData = new SqlCommand();
                cmData.Connection = cnData;
                cmData.CommandType = CommandType.Text;

                // Select query
                cmData.CommandText = "Select * from Customer where Email = '" + customer.Email + "'";
                // Execute above select query
                object existingCustomer = cmData.ExecuteScalar();

                // If the inputted email does not currently exist, input the details into the table.
                // This avoids creating another instance of the same customer
                if (existingCustomer == null)
                {
                    // Calls the AddNewCustomer method
                    customer.AddNewCustomer(customer.Email);

                    // Adds the customer ID from the customer table, auto incrementing
                    txtCustomerID.Text = customer.CustomerID.ToString();
                    // Show once customer has been added
                    DialogResult customerAdded = MessageBox.Show(customer.FirstName + " has been added.",
                         "Customer added", MessageBoxButtons.OK);

                    // If the user clicks ok
                    if (customerAdded == DialogResult.OK)
                    {
                        // Clears the details ready for the next customer to be added.
                        btnClearAdd_Click(sender, e);
                    }
                }

                // If customer already exists, based on the email
                else
                {                
                    DialogResult customerExists = MessageBox.Show(customer.Email + " already exists as a customer, " +
                        "please continue to the booking stage with this email, or create a customer under a new email.",
                         "Customer already exists", MessageBoxButtons.OK);

                    // If the user clicks ok
                    if (customerExists == DialogResult.OK)
                    {
                        // Clears the details ready for the next customer to be added.
                        btnClearAdd_Click(sender, e);
                    }
                }

                // Close connection
                cnData.Close();
            }
            catch (Exception error)
            {
                // Messagebox to remind the user that all fields need to be entered into,
                // or that the dob is not incorrectly entered, without crashing the program
                DialogResult usedString = MessageBox.Show("Please enter into all detail fields. For date of birth please enter format DD/MM/YYYY." +
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
            txtCustomerID.Clear();
            txtFirstName.Clear();
            txtSurname.Clear();
            txtDOB.Clear();
            cmbSex.ResetText();
            txtAddress.Clear();
            txtTown.Clear();
            txtPostCode.Clear();
            txtPhone.Clear();
            txtEmail.Clear();
        }

        private void btnGetDetails_Click(object sender, EventArgs e)
        {
            // Try catch to ensure the email input is existing
            try
            {
                // Gets the DataSet of the customer, selected by the given Email
                objCustomer = new Customer();
                dsCustomer = objCustomer.GetCustomerByEmail(fieldCustomerEmail.Text);

                // Start at the first row, located at row 0
                drCustomer = dsCustomer.Tables[0].Rows[0];

                //Bind data to DataGridView
                dataGridViewCustomer.DataSource = dsCustomer.Tables[0];

                //Display data for current row
                DisplayData();

                // Enables the update buttons
                btnUpdateCustomer.Enabled = true;
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

        private void dataGridViewCustomer_MouseClick(object sender, MouseEventArgs e)
        {
            try
            {
                // Stores the row number of the selected row
                int CurrentRowIndex = dataGridViewCustomer.CurrentRow.Index;

                // Gets the row at the position in the dataset determined by the row selected on the DataGridView
                drCustomer = dsCustomer.Tables[0].Rows[CurrentRowIndex];

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

        private void btnUpdateCustomer_Click(object sender, EventArgs e)
        {
            // Update the customer details
            drCustomer[0] = fieldCustomerID.Text;
            drCustomer[1] = fieldFirstName.Text;
            drCustomer[2] = fieldSurname.Text;
            drCustomer[3] = fieldDOB.Text;
            drCustomer[4] = fieldSex.Text;
            drCustomer[5] = fieldAddress.Text;
            drCustomer[6] = fieldTown.Text;
            drCustomer[7] = fieldPostCode.Text;
            drCustomer[8] = fieldPhone.Text;
            drCustomer[9] = fieldEmail.Text;
            dataGridViewCustomer.Refresh();
            MessageBox.Show("Customer updated", "Updated");
        }

        private void btnUpdateDatabase_Click(object sender, EventArgs e)
        {
            // Update the database
            objCustomer.UpdateCustomer(dsCustomer);
            MessageBox.Show("Database updated", "Updated");
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
