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

namespace Assignment2___BookACruise___NathanYates
{
    class Customer
    {
        private int m_CustomerID;
        private string m_FirstName;
        private string m_Surname;
        private DateTime m_DOB;
        private string m_Sex;
        private string m_Address;
        private string m_Town;
        private string m_PostCode;
        private string m_Phone;
        private string m_Email;

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

        // Declare a FirstName property of type string:
        public string FirstName
        {
            get
            {
                return m_FirstName;
            }
            set
            {
                m_FirstName = value;
            }
        }

        // Declare a Surname property of type string:
        public string Surname
        {
            get
            {
                return m_Surname;
            }
            set
            {
                m_Surname = value;
            }
        }

        // Declare a DOB property of type DateTime:
        public DateTime DOB
        {
            get
            {
                return m_DOB;
            }
            set
            {
                m_DOB = value;
            }
        }

        // Declare a Sex property of type string:
        public string Sex
        {
            get
            {
                return m_Sex;
            }
            set
            {
                m_Sex = value;
            }
        }

        // Declare an Address property of type string:
        public string Address
        {
            get
            {
                return m_Address;
            }
            set
            {
                m_Address = value;
            }
        }

        // Declare a Town property of type string:
        public string Town
        {
            get
            {
                return m_Town;
            }
            set
            {
                m_Town = value;
            }
        }

        // Declare a PostCode property of type string:
        public string PostCode
        {
            get
            {
                return m_PostCode;
            }
            set
            {
                m_PostCode = value;
            }
        }

        // Declare a Phone property of type string:
        public string Phone
        {
            get
            {
                return m_Phone;
            }
            set
            {
                m_Phone = value;
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

        // Write a new Customer record using the class' property values
        // After it stores the new record it reads the allocated CustomerID
        // and sets the corresponding property accordingly
        public void AddNewCustomer(string Email)
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
            cmData.CommandText = "INSERT INTO Customer(FirstName, Surname, DOB, Sex, Address, Town, PostCode, PhoneNumber, Email) VALUES('"
                + m_FirstName + "','" + m_Surname + "','" + m_DOB + "','" + m_Sex + "','" + m_Address + "','"
                + m_Town + "','" + m_PostCode + "','" + m_Phone + "','" + m_Email + "')";

            // Execute above insert query
            cmData.ExecuteNonQuery();

            // Gets the newly auto-incremented number to display within the customerID field
            cmData.CommandText = "Select MAX(CustomerID) FROM Customer";
            m_CustomerID = (int)cmData.ExecuteScalar();           

            // Close connection
            cnData.Close();
        }

        // Returns the customer matching the given Email
        public DataSet GetCustomerByEmail(string Email)
        {
            DataSet dsCustomer = new DataSet();

            //Get and open a connection
            string DataConnectionString = ConfigurationManager.ConnectionStrings["LinkToData"].ConnectionString;
            SqlConnection cnData = new SqlConnection(DataConnectionString);
            cnData.Open();

            // Set up the Command and DataAdapter
            SqlCommand cmData = new SqlCommand();
            cmData.Connection = cnData;
            cmData.CommandType = CommandType.Text;

            // Select query
            cmData.CommandText = "Select * from Customer where Email = '" + Email + "'";
            SqlDataAdapter daCustomer = new SqlDataAdapter(cmData);

            //Populate the DataSet
            daCustomer.Fill(dsCustomer);
            cnData.Close();
            return dsCustomer;
        }

        // Use the modified customer DataSet to update the Customer table
        public void UpdateCustomer(DataSet dsCustomer)
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
            cmData.CommandText = "Select * from Customer";
            SqlDataAdapter daCustomer = new SqlDataAdapter(cmData);

            //Use the sqlCommandBuilder to generate the UpdateCommand
            SqlCommandBuilder builder = new SqlCommandBuilder(daCustomer);
            builder.GetUpdateCommand();

            //Update the database
            daCustomer.Update(dsCustomer);
            cnData.Close();
            return;
        }
    }
}
