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
    public partial class Dashboard : Form
    {
        public Dashboard()
        {
            InitializeComponent();
        }

       

        private void button1_Click_1(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void bloodGrouToolStripMenuItem_Click(object sender, EventArgs e)
        {
            SearchDonor_byBloodGroup bg = new SearchDonor_byBloodGroup();
            bg.Show();
        }

        private void logOutToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Form1 fm = new Form1();
            fm.Show();
            this.Hide();
        }

        private void addNewDonarToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Add_new_Donar ad = new Add_new_Donar();
            ad.Show();
        }

        private void updateDetailsToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Update udd = new Update();
            udd.Show();
        }

        private void allDonarDetailsToolStripMenuItem_Click(object sender, EventArgs e)
        {
            All_Details Ad = new All_Details();
            Ad.Show();
        }

        private void locationToolStripMenuItem_Click(object sender, EventArgs e)
        {
            SearchBloodDonor sb = new SearchBloodDonor();
            sb.Show();
        }

        private void deleteDonarToolStripMenuItem1_Click(object sender, EventArgs e)
        {
            DeleteDonor dd = new DeleteDonor();
            dd.Show();
        }
    }
}
