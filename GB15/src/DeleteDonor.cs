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
    public partial class DeleteDonor : Form
    {
        function fn = new function();
        public DeleteDonor()
        {
            InitializeComponent();
        }

        private void txtDonorId_TextChanged(object sender, EventArgs e)
        {
                if(txtDonorId.Text == ""){
                txtName.Clear();
                txtfName.Clear();
                txtMname.Clear();
                dateTimePicker1.ResetText();
                txtMobile.Clear();
                cbGender.ResetText();
                txtEmail.Clear();
                cbBloodGroup.ResetText();
                txtCity.Clear();
                txtAddress.Clear();
            }
        }

        private void btnClose_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void btnSearch_Click(object sender, EventArgs e)
        {
            
            if (txtDonorId.Text != "") {
                String query = "select * from newDonor where D_id = '" + txtDonorId.Text + "'";
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
                    txtAddress.Text = ds.Tables[0].Rows[0][10].ToString();
                }

            }
            else
            {
                MessageBox.Show("No record exist", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
                
            }
        }

        private void btnDelete_Click(object sender, EventArgs e)
        {
           if( MessageBox.Show("Are You Sure", "Delete", MessageBoxButtons.OKCancel, MessageBoxIcon.Warning) == DialogResult.OK)
            {
              String  query = "delete  from newDonor where D_id = "+txtDonorId.Text+"";
                fn.setData(query);
            }
        }

        private void btnReset_Click(object sender, EventArgs e)
        {
            txtDonorId.Clear();
        }
    }
}

