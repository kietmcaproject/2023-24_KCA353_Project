using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace BloodBankManagement
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void panel1_Paint(object sender, PaintEventArgs e)
        {

        }

        private void Showlb_LinkClicked(object sender, LinkLabelLinkClickedEventArgs e)
        {
            if (Showlb.Text == "Show")
            {
                Showlb.Text = "Hide";
                textBox2.PasswordChar = '\0';
                
            }
            else
            {
                Showlb.Text = " Show";
                textBox2.PasswordChar = '*';
            }
        }

        private void checkBox_CheckedChanged(object sender, EventArgs e)
        {
            if (checkBox.Checked == true)
            {
                Loginbtn.Enabled = true;
            }
            else
            {
                Loginbtn.Enabled = false;
                MessageBox.Show("Please accept terms and conditions");
            }
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            Loginbtn.Enabled = false;

        }

        private void Loginbtn_Click(object sender, EventArgs e)
        {
            if (textBox1.Text == "diksha" && textBox2.Text == "pass" || textBox1.Text == "Admin" && textBox2.Text == "12345")
            {
                Dashboard db = new Dashboard();
                db.Show();
                this.Hide();
            }
           
            else
            {
                MessageBox.Show("Enter valid username or password", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
        }

        private void btnExit_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void button1_Click(object sender, EventArgs e)
        {

        }

        private void signupbtn_Click(object sender, EventArgs e)
        {
            SignUp sn = new SignUp();
            sn.Show();
            this.Hide();
        }

        private void textBox1_TextChanged(object sender, EventArgs e)
        {

        }
    }
}
