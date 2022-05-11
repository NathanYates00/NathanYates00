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
    public partial class MainMenu : Form
    {
        public MainMenu()
        {
            InitializeComponent();
        }

        private void btnCustomer_MouseHover(object sender, EventArgs e) // When cursor is moved onto the menu button.
        {
            this.btnCustomer.BackColor = Color.DarkCyan;
        }

        private void btnCustomer_MouseLeave(object sender, EventArgs e) // When cursor is moved off the menu button.
        {
            this.btnCustomer.BackColor = Color.DarkGreen;
        }

        private void btnCustomer_Click(object sender, EventArgs e)
        {
            Add_ViewCustomer customer = new Add_ViewCustomer();
            customer.Show();
            this.Hide();
        }

        private void btnAddBooking_MouseHover(object sender, EventArgs e)
        {
            this.btnAddBooking.BackColor = Color.DarkCyan;
        }

        private void btnAddBooking_MouseLeave(object sender, EventArgs e)
        {
            this.btnAddBooking.BackColor = Color.DarkGreen;
        }

        private void btnAddBooking_Click(object sender, EventArgs e)
        {
            AddBooking addBooking = new AddBooking();
            addBooking.Show();
            this.Hide();
        }

        private void btnViewBooking_MouseHover(object sender, EventArgs e)
        {
            this.btnViewBooking.BackColor = Color.DarkCyan;
        }

        private void btnViewBooking_MouseLeave(object sender, EventArgs e)
        {
            this.btnViewBooking.BackColor = Color.DarkGreen;
        }

        private void btnViewBooking_Click(object sender, EventArgs e)
        {
            View_CancelBookings viewBookings = new View_CancelBookings();
            viewBookings.Show();
            this.Hide();
        }

        private void btnViewTourBookings_MouseHover(object sender, EventArgs e)
        {
            this.btnViewTourBookings.BackColor = Color.DarkCyan;
        }

        private void btnViewTourBookings_MouseLeave(object sender, EventArgs e)
        {
            this.btnViewTourBookings.BackColor = Color.DarkGreen;
        }

        private void btnViewTourBookings_Click(object sender, EventArgs e)
        {
            checkTourDate checkTour = new checkTourDate();
            checkTour.Show();
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

        private void btnExit_Click(object sender, EventArgs e) // When the exit button is clicked, asks the user if they are sure that they wish to exit the program.
        {
            DialogResult exitAns = MessageBox.Show("Are you sure you \n wish to exit?", "Exit?", MessageBoxButtons.YesNo, MessageBoxIcon.Question);
            if (exitAns == DialogResult.Yes)
            {
                Application.Exit();
            }
        }
    }

    // Cruise image: https://clipart.world/cruise-ship-clipart/cruise-ship-png-transparent/
}
