using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

// Add the extra using statements
using System.Data;
using System.Data.SqlClient;
using System.Configuration;
using System.Collections;
using System.Windows.Forms;

namespace Assignment2___BookACruise___NathanYates
{
    class Bookings
    {
        private int m_BookingID;
        private int m_CustomerID;
        private DateTime m_TourDate;
        private string m_CabinType;
        private int m_NumberOfOccupants;
        private decimal m_Price;
        private string m_Email;

        // Declare a BookingID property of type int:
        public int BookingID
        {
            get
            {
                return m_BookingID;
            }

            set
            {
                m_BookingID = value;
            }
        }

        // Declare a CustomerID property of type int:
        public int CustomerID
        {
            get
            {
                return m_CustomerID;
            }

            set
            {
                m_CustomerID = value;
            }
        }

        // Declare a TourDate property of type datetime:
        public DateTime TourDate
        {
            get
            {
                return m_TourDate;
            }
            set
            {
                m_TourDate = value;
            }
        }

        // Declare a CabinType property of type string:
        public string CabinType
        {
            get
            {
                return m_CabinType;
            }
            set
            {
                m_CabinType = value;
            }
        }

        // Declare a NumberOfOccupants property of type int:
        public int NumberOfOccupants
        {
            get
            {
                return m_NumberOfOccupants;
            }
            set
            {
                m_NumberOfOccupants = value;
            }
        }

        // Declare a Price property of type decimal:
        public decimal Price
        {
            get
            {
                return m_Price;
            }
            set
            {
                m_Price = value;
            }
        }

        // Declare a Email property of type string:
        public string Email
        {
            get
            {
                return m_Email;
            }
            set
            {
                m_Email = value;
            }
        }

        // This is used so that the CustomerID can be found and used within the Booking
        public void GetCustomerIDFromEmail()
        {
            // Try catch to ensure the email entered is existing to a customers details.
            try
            {
                // Get and open a connection
                string DataConnectionString = ConfigurationManager.ConnectionStrings["LinkToData"].ConnectionString;
                SqlConnection cnData = new SqlConnection(DataConnectionString);
                cnData.Open();

                // Set up the Command and DataAdapter
                SqlCommand cmData = new SqlCommand();
                cmData.Connection = cnData;
                cmData.CommandType = CommandType.Text;

                // Select customerID from the customer table where email = what was inputted by the user.
                cmData.CommandText = "Select CustomerID from Customer where Email = '" + m_Email + "'";
                cmData.ExecuteNonQuery();

                // Sets the customerID as the found customerID.
                m_CustomerID = (int)cmData.ExecuteScalar();

                // Close connection
                cnData.Close();
            }
            catch (Exception error)
            {
                // Messagebox if the email entered does not exist, without crashing the program
                DialogResult usedString = MessageBox.Show("CustomerID cannot be found. Please enter ensure the email entered is correct." +
                    "\nDo you want to see more information?", "Confirm", MessageBoxButtons.YesNo);

                // If the user says yes for more information
                if (usedString == DialogResult.Yes)
                {
                    // Long error message output into a seperate messagebox
                    MessageBox.Show(error.ToString());
                }
            }
        }

        // Write a new Booking record using the class' property values
        // After it stores the new record it reads the allocated BookingID
        // and sets the corresponding property accordingly
        public void AddNewBooking()
        {
            // Get and open a connection
            string DataConnectionString = ConfigurationManager.ConnectionStrings["LinkToData"].ConnectionString;
            SqlConnection cnData = new SqlConnection(DataConnectionString);
            cnData.Open();

            // Set up the Command and DataAdapter
            SqlCommand cmData = new SqlCommand();
            cmData.Connection = cnData;
            cmData.CommandType = CommandType.Text;

            // Insert query
            cmData.CommandText = "INSERT INTO Bookings(CustomerID, TourDate, CabinType, NumberOfOccupants, Price, CustomerEmail) VALUES('"
                + m_CustomerID + "','" + m_TourDate + "','" + m_CabinType + "','" 
                + m_NumberOfOccupants + "','" + m_Price + "','" + m_Email + "')";

            // Execute above insert query
            cmData.ExecuteNonQuery();

            // Gets the newly auto-incremented number to display within the BookingID field
            cmData.CommandText = "Select MAX(BookingID) FROM Bookings";
            m_BookingID = (int)cmData.ExecuteScalar();

            // Close connection
            cnData.Close();
        }

        // Returns the customer matching the given Email
        public DataSet GetBookingByEmail(string Email)
        {
            DataSet dsBooking = new DataSet();

            //Get and open a connection
            string DataConnectionString = ConfigurationManager.ConnectionStrings["LinkToData"].ConnectionString;
            SqlConnection cnData = new SqlConnection(DataConnectionString);
            cnData.Open();

            // Set up the Command and DataAdapter
            SqlCommand cmData = new SqlCommand();
            cmData.Connection = cnData;
            cmData.CommandType = CommandType.Text;

            // Select query
            cmData.CommandText = "Select * from Bookings where CustomerEmail = '" + Email + "'";
            SqlDataAdapter daBooking = new SqlDataAdapter(cmData);

            //Populate the DataSet
            daBooking.Fill(dsBooking);
            cnData.Close();
            return dsBooking;
        }

        // Returns the customer matching the given Email
        public DataSet GetBookingByTourDateAndCabinType(DateTime TourDate, string CabinType)
        {
            DataSet dsBooking = new DataSet();

            //Get and open a connection
            string DataConnectionString = ConfigurationManager.ConnectionStrings["LinkToData"].ConnectionString;
            SqlConnection cnData = new SqlConnection(DataConnectionString);
            cnData.Open();

            // Set up the Command and DataAdapter
            SqlCommand cmData = new SqlCommand();
            cmData.Connection = cnData;
            cmData.CommandType = CommandType.Text;

            // Select query
            cmData.CommandText = "Select * from Bookings where TourDate = '" + TourDate + "' and CabinType = '" + CabinType + "'";
            SqlDataAdapter daBooking = new SqlDataAdapter(cmData);

            //Populate the DataSet
            daBooking.Fill(dsBooking);
            cnData.Close();
            return dsBooking;
        }

        // Use the modified customer DataSet to update the Customer table
        public void UpdateBooking(DataSet dsBooking)
        {
            //Get and open a connection
            string DataConnectionString = ConfigurationManager.ConnectionStrings["LinkToData"].ConnectionString;
            SqlConnection cnData = new SqlConnection(DataConnectionString);
            cnData.Open();

            // Set up the Command and DataAdapter
            SqlCommand cmData = new SqlCommand();
            cmData.Connection = cnData;
            cmData.CommandType = CommandType.Text;

            // Select query
            cmData.CommandText = "Select * from Bookings";
            SqlDataAdapter daBooking = new SqlDataAdapter(cmData);

            //Use the sqlCommandBuilder to generate the UpdateCommand
            SqlCommandBuilder builder = new SqlCommandBuilder(daBooking);
            builder.GetUpdateCommand();

            //Update the database
            daBooking.Update(dsBooking);
            cnData.Close();
            return;
        }

        public void CancelBooking(string BookingID)
        {
            // Get and open a connection
            string DataConnectionString = ConfigurationManager.ConnectionStrings["LinkToData"].ConnectionString;
            SqlConnection cnData = new SqlConnection(DataConnectionString);
            cnData.Open();

            // Set up the Command and DataAdapter
            SqlCommand cmData = new SqlCommand();
            cmData.Connection = cnData;
            cmData.CommandType = CommandType.Text;

            // Delete from the bookings table where bookingID = what was inputted by the user.
            cmData.CommandText = "DELETE FROM Bookings WHERE BookingID = '" + BookingID + "'";
            cmData.ExecuteNonQuery();

            // Close connection
            cnData.Close();
        }
    }
}
