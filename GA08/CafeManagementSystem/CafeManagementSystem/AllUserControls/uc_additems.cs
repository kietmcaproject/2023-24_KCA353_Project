using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Diagnostics.PerformanceData;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace CafeManagementSystem.AllUserControls
{
    public partial class uc_additems : UserControl
    {
        function fn = new function();
        String query;

        public uc_additems()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            // Add item button
            query = "insert into items(name, category, price) values ('"+ txtitemname.Text+"','"+ txtcategory.Text+"',"+txtprice.Text+")";
            fn.setdata(query);
            clearall();
        }

        public void clearall()
        {
            txtcategory.SelectedIndex = -1;
            txtitemname.Clear();
            txtprice.Clear();
        }

        private void uc_additems_Leave(object sender, EventArgs e)
        {
            clearall();
        }

        private void label2_Click(object sender, EventArgs e)
        {

        }
    }
}
