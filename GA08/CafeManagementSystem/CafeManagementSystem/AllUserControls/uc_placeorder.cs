//using DGVPrinterHelper;
using DGVPrinterHelper;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Windows.Forms.VisualStyles;

namespace CafeManagementSystem.AllUserControls
{
    public partial class uc_placeorder : UserControl
    {
        function fn = new function();
        String query;

        public uc_placeorder()
        {
            InitializeComponent();
        }

        private void cmbcategory_SelectedIndexChanged(object sender, EventArgs e)
        {
            String category = cmbcategory.Text;
            query = "Select name from items where category = '"+category+"'";
            showitemlist(query);
        }

        private void txtsearch_TextChanged(object sender, EventArgs e)
        {
            String category = cmbcategory.Text;
            query = "Select name from items where category = '" + category + "' and name like '"+txtsearch.Text+"%'";
            showitemlist(query);
        }

        private void showitemlist(String query)
        {
            listBox1.Items.Clear();
            DataSet ds = fn.getdata(query);
            for(int i=0; i < ds.Tables[0].Rows.Count;i++)
            {
                listBox1.Items.Add(ds.Tables[0].Rows[i][0].ToString());
            }
        }

        private void listBox1_SelectedIndexChanged(object sender, EventArgs e)
        {
            txtquantity.ResetText();
            txttotal.Clear();

            String text = listBox1.GetItemText(listBox1.SelectedItem);
            txtitemname.Text = text;
            query =  "select price from items where name = '"+text+"' ";
            DataSet ds = fn.getdata(query);
            txtprice.Text = ds.Tables[0].Rows[0][0].ToString();
        }

        private void txtquantity_ValueChanged(object sender, EventArgs e)
        {
            int quan = int.Parse(txtquantity.Value.ToString());
            int price = int.Parse(txtprice.Text);
            txttotal.Text = (quan * price).ToString(); 
        }

        protected int n, total = 0;

         
        private void btnaddtocart_Click(object sender, EventArgs e)
        {
            if (txttotal.Text != "0" && txttotal.Text != "")
            {
                n = dataGridView1.Rows.Add();
                dataGridView1.Rows[n].Cells[0].Value = txtitemname.Text;
                dataGridView1.Rows[n].Cells[1].Value = txtprice.Text;
                dataGridView1.Rows[n].Cells[2].Value = txtquantity.Text;
                dataGridView1.Rows[n].Cells[3].Value = txttotal.Text;

                total += int.Parse(txttotal.Text);
                lbltotalamount.Text = "Rs. " + total;
            }
            else
                MessageBox.Show("Minimum quantity needs to be 1","Information",MessageBoxButtons.OK,MessageBoxIcon.Information);
        }

        int amount;


        private void dataGridView1_CellClick(object sender, DataGridViewCellEventArgs e)
        {
            amount = int.Parse(dataGridView1.Rows[e.RowIndex].Cells[3].Value.ToString());
        }


        private void btnremove_Click(object sender, EventArgs e)
        {
            dataGridView1.Rows.RemoveAt(this.dataGridView1.SelectedRows[0].Index);
            total -= amount;
            lbltotalamount.Text = "Rs. " + total; 
        }

        private void button1_Click(object sender, EventArgs e)
        {
            // Print button
            DGVPrinter printer = new DGVPrinter();
            printer.Title = "Customer Bill";
            printer.SubTitle = string.Format("Date: {0}", DateTime.Now.Date);
            printer.SubTitleFormatFlags = StringFormatFlags.LineLimit | StringFormatFlags.NoClip;
            printer.PageNumbers = true;
            printer.PageNumberInHeader = false;
            printer.PorportionalColumns = true;
            printer.HeaderCellAlignment = StringAlignment.Near;
            printer.Footer = "Total Payable Amount: "+ lbltotalamount.Text;
            printer.FooterSpacing = 15;
            printer.PrintDataGridView(dataGridView1);

            total = 0;
            dataGridView1.Rows.Clear();
            lbltotalamount.Text = "Rs. " + total;

            // clearing the fields
            txtitemname.Clear();
            txtprice.Clear();
            // txtquantity.Value = 0;
            txttotal.Clear();
        }

        private void uc_placeorder_Load(object sender, EventArgs e)
        {

        }

    }
}
