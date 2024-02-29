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
    public partial class uc_welcome : UserControl
    {
        public uc_welcome()
        {
            InitializeComponent();
        }

        int num = 0;
        private void timer1_Tick(object sender, EventArgs e)
        {
            if(num == 0)
            {
                //lblbanner.Location = new Point(55, 476);
                lblbanner.ForeColor = Color.Orange;
                num++;
            }
            else if(num == 1)
            {
                //lblbanner.Location = new Point(105, 476);
                lblbanner.ForeColor = Color.Green;
                num++;
            }
            else if(num == 2)
            {
                //lblbanner.Location = new Point(155, 476);
                lblbanner.ForeColor = Color.RoyalBlue;
                num = 0;
            }
        }

        private void uc_welcome_Load(object sender, EventArgs e)
        {
            timer1.Start();
        }
    }
}
