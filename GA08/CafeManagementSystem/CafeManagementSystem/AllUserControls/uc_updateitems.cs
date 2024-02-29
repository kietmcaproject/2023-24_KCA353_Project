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
    public partial class uc_updateitems : UserControl
    {
        function fn = new function();
        String query;

        public uc_updateitems()
        {
            InitializeComponent();
        }

        private void uc_updateitems_Load(object sender, EventArgs e)
        {
            
            loaddata();
        }

        public void loaddata()
        {
            query = "select * from items";
            DataSet ds = fn.getdata(query);
            dataGridView1.DataSource = ds.Tables[0];
        }

        private void txtsearch_TextChanged(object sender, EventArgs e)
        {
            query = "select * from items where name like '"+txtsearch.Text+"%'";
            DataSet ds = fn.getdata(query);
            dataGridView1.DataSource = ds.Tables[0];
        }

        int id;
        private void dataGridView1_CellClick(object sender, DataGridViewCellEventArgs e)
        {
            id = int.Parse(dataGridView1.Rows[e.RowIndex].Cells[0].Value.ToString());
            String name = dataGridView1.Rows[e.RowIndex].Cells[1].Value.ToString();
            String category = dataGridView1.Rows[e.RowIndex].Cells[2].Value.ToString();
            int price = int.Parse(dataGridView1.Rows[e.RowIndex].Cells[3].Value.ToString());

            txtitemname.Text = name;
            txtcategory.Text = category;
            txtprice.Text = price.ToString();
        }

        private void btnupdate_Click(object sender, EventArgs e)
        {
            query = "update items set name = '" + txtitemname.Text + "',category = '" + txtcategory.Text + "',price = " + txtprice.Text + " where iid = " + id + "";
            fn.setdata(query);
            loaddata();

            txtitemname.Clear();
            txtcategory.Clear();
            txtprice.Clear();
        }
    }
}
