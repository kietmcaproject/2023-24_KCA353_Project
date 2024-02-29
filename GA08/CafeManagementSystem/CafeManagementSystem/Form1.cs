using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Drawing.Text;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace CafeManagementSystem
{
    public partial class Login : Form
    {
        public Login()
        {
            InitializeComponent();
        }

        private void btnguest_LinkClicked(object sender, LinkLabelLinkClickedEventArgs e)
        {
            Dashboard ds = new Dashboard("Guest");
            ds.Show();
            this.Hide();    
        }

        private void btnlogin_Click(object sender, EventArgs e)
        {
            //if(txtusername.Text == "Admin" &&  txtpassword.Text == "pass")
            //{
            //    Dashboard d = new Dashboard("Admin");
            //    d.Show();
            //    this.Hide();
            //}



            string username = txtusername.Text;
            string password = txtpassword.Text;

            // Check if username and password are not empty
            if (string.IsNullOrWhiteSpace(username) || string.IsNullOrWhiteSpace(password))
            {
                MessageBox.Show("Please enter both username and password.", "Login Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
                return;
            }

            // Your authentication logic here (e.g., check against a database)
            bool isAuthenticated = AuthenticateUser(username, password);

            if (isAuthenticated)
            {
                // Navigate to the main form or perform necessary actions upon successful login
                MessageBox.Show("Login successful!", "Success", MessageBoxButtons.OK, MessageBoxIcon.Information);

                // TODO: Open main form or perform other actions

                Dashboard d = new Dashboard("Admin");
                d.Show();
                this.Hide();
            }
            else
            {
                MessageBox.Show("Invalid username or password.", "Login Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
        }

        private bool AuthenticateUser(string username, string password)
        {
            // Implement your authentication logic here (e.g., check against a database)
            // Return true if authentication is successful, false otherwise
            // Replace this with your actual authentication logic
            return (username == "Admin" && password == "2580");
        }

        private void Login_Load(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {
            //this.Close();
            Application.Exit();
        }
    }
}
