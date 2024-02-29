using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace CafeManagementSystem
{
    public partial class Dashboard : Form
    {
        public Dashboard()
        {
            InitializeComponent();
        }

        public Dashboard(String user)
        {
            InitializeComponent();
            if(user == "Guest")
            {
                btnadd.Hide();
                btnremove.Hide();
                btnupdate.Hide();
            }
            else if(user == "Admin")
            {
                btnadd.Show();
                btnremove.Show();
                btnupdate.Show();
                btnplaceorder.Hide();
            }
        }

        private void btnclose_Click(object sender, EventArgs e)
        {
            // Exit button
            Application.Exit();
        }

        private void btnlogout_LinkClicked(object sender, LinkLabelLinkClickedEventArgs e)
        {
            Login l = new Login();
            this.Hide();
            l.Show();
        }

        private void btnadd_Click(object sender, EventArgs e)
        {
            uc_additems1.Visible=true;
            uc_placeorder1.Visible = false;
            uc_removeitem1.Visible = false;
            uc_updateitems1.Visible = false;
            uc_additems1.BringToFront();
        }

        private void Dashboard_Load(object sender, EventArgs e)
        {
            uc_additems1.Visible = false;
            uc_placeorder1.Visible = false;
            uc_updateitems1.Visible = false;
            uc_removeitem1.Visible = false;

            // Calculate the center horizonatally 
            int center = (this.ClientSize.Width - panel1.Width - panel2.Width) / 2;

            //set the location of the left panel horizontally 
            panel1.Location = new Point(center, panel1.Location.X);

            // set the location of the right panel next to the left panel  
            panel2.Location = new Point(center + panel1.Width, panel2.Location.Y);
        }

        private void btnplaceorder_Click_1(object sender, EventArgs e)
        {
            uc_welcome1.SendToBack();
            uc_placeorder1.Visible = true;
            uc_placeorder1.BringToFront();
        }

        private void btnupdate_Click(object sender, EventArgs e)
        {
            uc_updateitems1.Visible = true;
            uc_updateitems1.BringToFront();

        }

        private void btnremove_Click(object sender, EventArgs e)
        {
            uc_removeitem1.Visible = true;
            uc_removeitem1.BringToFront();
        }
    }
}
