using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace CafeManagementSystem.AllUserControls
{
    public partial class uc_removeitem : UserControl
    {
        function fn = new function();
        String query;

        public uc_removeitem()
        {
            InitializeComponent();
        }

        private void uc_removeitem_Load(object sender, EventArgs e)
        {
            dellabel.Text = "How to DELETE?";
            dellabel.ForeColor = Color.Blue;
            loaddata();
        }

        public void loaddata()
        {
            //dellabel.Text = "How to DELETE?";
            //dellabel.ForeColor = Color.Blue;
            query = "select * from items";
            DataSet ds = fn.getdata(query);
            dataGridView1.DataSource = ds.Tables[0];
        }

        private void txtsearch_TextChanged(object sender, EventArgs e)
        {
            query = "Select * from items where name like '"+txtsearch.Text+"%' ";
            DataSet ds = fn.getdata(query);
            dataGridView1 .DataSource = ds.Tables[0];
        }

        private void dataGridView1_CellClick(object sender, DataGridViewCellEventArgs e)
        {
            if(MessageBox.Show("Delete item?","Important Message",MessageBoxButtons.OKCancel,MessageBoxIcon.Warning) == DialogResult.OK) 
            {
                int id = int.Parse(dataGridView1.Rows[e.RowIndex].Cells[0].Value.ToString());
                query = "delete from items where iid = " + id + "";
                fn.setdata(query);
                loaddata();
            }
        }

        private void dellabel_Click(object sender, EventArgs e)
        {
            dellabel.ForeColor = Color.Red;
            dellabel.Text = "*Click on the Row to delete the Item.";
        }

        private void uc_removeitem_Enter(object sender, EventArgs e)
        {
            loaddata();
        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {
            dellabel.Text = "How to DELETE?";
            dellabel.ForeColor = Color.Blue;
        }
    }
}
