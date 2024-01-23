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
    public partial class Update : Form
    {
        function fn = new function();
        public Update()
        {
            InitializeComponent();
        }

        private void label3_Click(object sender, EventArgs e)
        {

        }

        private void btnClose_Click(object sender, EventArgs e)
        {
            this.Close();
        }
        private void btnSearch_Click(object sender, EventArgs e)
        {
            int id = int.Parse(txtDonorId.Text.ToString());
           String query = "select * from newDonor where D_id = '"+id+"'";
                DataSet ds = fn.getData(query);
            if (ds.Tables[0].Rows.Count != 0)
            {
                txtName.Text = ds.Tables[0].Rows[0][1].ToString();
                 txtfName.Text = ds.Tables[0].Rows[0][2].ToString();
                txtMname.Text = ds.Tables[0].Rows[0][3].ToString();
                dateTimePicker1.Text = ds.Tables[0].Rows[0][4].ToString();
                txtMobile.Text = ds.Tables[0].Rows[0][5].ToString();
                cbGender.Text = ds.Tables[0].Rows[0][6].ToString();
                txtEmail.Text = ds.Tables[0].Rows[0][7].ToString();
                cbBloodGroup.Text = ds.Tables[0].Rows[0][8].ToString();
                txtCity.Text = ds.Tables[0].Rows[0][9].ToString();
                txtAddress.Text = ds.Tables[0].Rows[0][10].ToString() ;
              
              
                
                

            }
            else
            {
                MessageBox.Show("Invalid Id", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }

        }

        private void txtDonorId_TextChanged(object sender, EventArgs e)
        {

        }
        private void btnReset_Click(object sender, EventArgs e)
        {
            txtDonorId.Clear();
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
        private void btnUpdate_Click(object sender, EventArgs e)
        {
            String query = "Update newDonor set D_name =  '" + txtName.Text + "', F_name = '" + txtfName.Text + "', M_name = '" + txtMname.Text + "',DOB= '" + dateTimePicker1.Text + "', Mobile = '" + txtMobile.Text + "', Gender = '" + cbGender.Text + "', Email = '" + txtEmail.Text + "',  BloodGroup='"+cbBloodGroup.Text+"', City = '"+txtCity.Text+"', D_Address = '" + txtAddress.Text + "' where D_id = '"+txtDonorId.Text+"' ";
            fn.setData(query);
            Update_Load(this, null);
        }

        private void Update_Load(object sender, EventArgs e)
        {
            txtDonorId.Clear();

        }
    }
}
