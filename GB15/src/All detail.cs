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
    public partial class All_Details : Form
    {
        function fn = new function();
        public All_Details()
        {
            InitializeComponent();
        }

        private void btnClose_Click(object sender, EventArgs e)
        {
            this.Close();

        }

        private void All_Details_Load(object sender, EventArgs e)
        {
            String query = "Select * from newDonor";
            DataSet ds = fn.getData(query);
            dataGridView1.DataSource = ds.Tables[0]; 
        }
    }
}
