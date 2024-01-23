using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Net;
using System.Reflection;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Xml.Linq;
using static System.Windows.Forms.VisualStyles.VisualStyleElement;
using static System.Windows.Forms.VisualStyles.VisualStyleElement.ListView;

namespace BloodBankManagement
{
    public partial class SignUp : Form
    {
        function fn = new function();
        public SignUp()
        {
            InitializeComponent();
        }

        private void Showlb_LinkClicked(object sender, LinkLabelLinkClickedEventArgs e)
        {

            if (Showlb2.Text == "Show")
            {
                Showlb2.Text = "Hide";
                txtpassword.PasswordChar = '\0';

            }
            else
            {
                Showlb2.Text = " Show";
                txtpassword.PasswordChar = '*';
            }
        }

        private void Showlb2_LinkClicked(object sender, LinkLabelLinkClickedEventArgs e)
        {

            if (Showlb1.Text == "Show")
            {
                Showlb1.Text = "Hide";
                txtCPassword.PasswordChar = '\0';

            }
            else
            {
                Showlb1.Text = " Show";
                txtCPassword.PasswordChar = '*';
            }
        }

        private void SignUp_Load(object sender, EventArgs e)
        {
          
        }

        private void btnExit_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void signupbtn_Click(object sender, EventArgs e)
        {
            if (txtFname.Text != "" && txtpassword.Text != "" && txtCPassword.Text != "")
            {
                if (txtpassword.Text == txtCPassword.Text)
                {
                    String UserName = txtusr.Text;
                    String Password = txtpassword.Text;
                    String ConfirmPassword = txtCPassword.Text;
                    String FirstName = txtFname.Text;
                    String LastName = txtLname.Text;
                    String query = "Insert into signUp(Username,Password,Confirm_Password,First_Name,Last_Name) values('" + UserName + "','" + Password + "','" + ConfirmPassword + "','" + FirstName + "','" + LastName + "')";
                    fn.setData(query);
                    Dashboard db = new Dashboard();
                    db.Show();
                    this.Hide();
                }
                else
                {
                    MessageBox.Show("Entered Password and Confirm Password should be same", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
                }
                
            }
            else
            {
                MessageBox.Show("Fill all the Details", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
        }

        private void button1_Click(object sender, EventArgs e)
        {
            Form1 fm = new Form1();
            fm.Show();
            this.Hide();

        }
    }

}
