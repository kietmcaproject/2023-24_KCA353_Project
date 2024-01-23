using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Text.RegularExpressions;
using System.Diagnostics.Eventing.Reader;
using System.Xml.Linq;

namespace BloodBankManagement
{
    public partial class Add_new_Donar : Form
    {
        function fn = new function();
        //string emailpattern = "^[a - z0 - 9!#$%&'*+/=?^_`{|}~-]+(?:\\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$";


        public object Integer { get; private set; }

        public Add_new_Donar()
        {
            InitializeComponent();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            this.Close();
     }
        private void Add_new_Donar_Load(object sender, EventArgs e)
        {
            String query = "Select max(D_id) from newDonor";
            DataSet ds = fn.getData(query);
            
           int count = int.Parse(ds.Tables[0].Rows[0][0].ToString());
            lbId.Text = (count +1).ToString();
        }

        private void btnSave_Click(object sender, EventArgs e)
        {
            if (txtName.Text != "" && txtfName.Text != "" && txtMname.Text != "" && txtEmail.Text != "" && txtAddress.Text != "" && cbGender.Text != "" && cbBloodGroup.Text != "" && txtCity.Text != "" && txtMobile.Text != "")
            {

                String Dname = txtName.Text;
                String Fname = txtfName.Text;
                String Mname = txtMname.Text;
                String Email = txtEmail.Text;
                String Address = txtAddress.Text;
                String Gender = cbGender.Text;
                String BloodGroup = cbBloodGroup.Text;
                String City = txtCity.Text;
                Int64 Mobile =Int64.Parse(txtMobile.Text);
                String DOB = dateTimePicker1.Text;

                String query = "Insert into newDonor(D_name,F_name,M_name,DOB,Mobile,Gender,Email,BloodGroup,City,D_Address) values('"+Dname+"','"+Fname+"','"+Mname+ "','"+DOB+ "','"+Mobile+ "','"+Gender+"','"+Email+"','"+BloodGroup+"','"+City+ "','"+Address+"')";
                fn.setData(query);

            }
            else
            {
                MessageBox.Show("Fill all the Details", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
        }

        private void txtMobile_TextChanged(object sender, EventArgs e)
        {
            if(txtMobile.TextLength == 10)
            {
                txtMobile.ForeColor = Color.Black;
            }
            else
            {
                txtMobile.ForeColor = Color.Red;
            }
        }

        private void txtMobile_KeyPress(object sender, KeyPressEventArgs e)
        {
            if(!char.IsDigit(e.KeyChar)&& !char.IsControl(e.KeyChar))
            {
                e.Handled = true;
                MessageBox.Show("Error, A Phone number cannot contain letters");
            }
        }
        private void txtEmail_TextChanged(object sender, EventArgs e)
        {}private void txtEmail_Leave(object sender, EventArgs e)
        {} private void txtEmail_KeyPress(object sender, KeyPressEventArgs e)
        {}
        private void txtEmail_Validating(object sender, CancelEventArgs e)
        {
            System.Text.RegularExpressions.Regex rEmail = new System.Text.RegularExpressions.Regex(@"^[a-zA-Z][\w\.-]{2,28}[a-zA-Z0-9]@[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z]$");
        if(txtEmail.Text.Length>0)
            {
                if (!rEmail.IsMatch(txtEmail.Text))
                {
                    MessageBox.Show("Enter a valid Email Id","Error",MessageBoxButtons.OK, MessageBoxIcon.Error);
                    txtEmail.SelectAll();
                    e.Cancel = true;
                }
            }
        }

        private void btnReset_Click(object sender, EventArgs e)
        {
            txtName.Clear();
            txtfName.Clear();
            txtMname.Clear();
            txtEmail.Clear();
            txtAddress.Clear();
            cbGender.Text = string.Empty;
            cbBloodGroup.Text = string.Empty;
            txtCity.Clear();
            txtMobile.Clear();
           

        }

        private void txtName_Validating(object sender, CancelEventArgs e)
        {
            if (string.IsNullOrEmpty(Name)) {
                Console.WriteLine("Name can't be empty!");
                    }
        }
    }
}
