namespace CafeManagementSystem
{
    partial class Dashboard
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.panel1 = new System.Windows.Forms.Panel();
            this.btnlogout = new System.Windows.Forms.LinkLabel();
            this.btnclose = new System.Windows.Forms.Button();
            this.btnremove = new System.Windows.Forms.Button();
            this.btnupdate = new System.Windows.Forms.Button();
            this.btnadd = new System.Windows.Forms.Button();
            this.btnplaceorder = new System.Windows.Forms.Button();
            this.panel2 = new System.Windows.Forms.Panel();
            this.uc_welcome1 = new CafeManagementSystem.AllUserControls.uc_welcome();
            this.uc_updateitems1 = new CafeManagementSystem.AllUserControls.uc_updateitems();
            this.uc_removeitem1 = new CafeManagementSystem.AllUserControls.uc_removeitem();
            this.uc_placeorder1 = new CafeManagementSystem.AllUserControls.uc_placeorder();
            this.uc_additems1 = new CafeManagementSystem.AllUserControls.uc_additems();
            this.panel1.SuspendLayout();
            this.panel2.SuspendLayout();
            this.SuspendLayout();
            // 
            // panel1
            // 
            this.panel1.BackColor = System.Drawing.Color.RoyalBlue;
            this.panel1.Controls.Add(this.btnlogout);
            this.panel1.Controls.Add(this.btnclose);
            this.panel1.Controls.Add(this.btnremove);
            this.panel1.Controls.Add(this.btnupdate);
            this.panel1.Controls.Add(this.btnadd);
            this.panel1.Controls.Add(this.btnplaceorder);
            this.panel1.Location = new System.Drawing.Point(12, 12);
            this.panel1.Name = "panel1";
            this.panel1.Size = new System.Drawing.Size(251, 1082);
            this.panel1.TabIndex = 0;
            // 
            // btnlogout
            // 
            this.btnlogout.AutoSize = true;
            this.btnlogout.Font = new System.Drawing.Font("Microsoft Sans Serif", 16F, System.Drawing.FontStyle.Italic);
            this.btnlogout.LinkColor = System.Drawing.Color.White;
            this.btnlogout.Location = new System.Drawing.Point(62, 809);
            this.btnlogout.Name = "btnlogout";
            this.btnlogout.Size = new System.Drawing.Size(132, 37);
            this.btnlogout.TabIndex = 5;
            this.btnlogout.TabStop = true;
            this.btnlogout.Text = "Log Out";
            this.btnlogout.LinkClicked += new System.Windows.Forms.LinkLabelLinkClickedEventHandler(this.btnlogout_LinkClicked);
            // 
            // btnclose
            // 
            this.btnclose.BackColor = System.Drawing.Color.Violet;
            this.btnclose.Font = new System.Drawing.Font("Microsoft Sans Serif", 20F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnclose.Location = new System.Drawing.Point(20, 14);
            this.btnclose.Name = "btnclose";
            this.btnclose.Size = new System.Drawing.Size(78, 61);
            this.btnclose.TabIndex = 4;
            this.btnclose.Text = "X";
            this.btnclose.UseVisualStyleBackColor = false;
            this.btnclose.Click += new System.EventHandler(this.btnclose_Click);
            // 
            // btnremove
            // 
            this.btnremove.BackColor = System.Drawing.Color.RoyalBlue;
            this.btnremove.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnremove.ForeColor = System.Drawing.Color.White;
            this.btnremove.Location = new System.Drawing.Point(20, 444);
            this.btnremove.Name = "btnremove";
            this.btnremove.Size = new System.Drawing.Size(214, 65);
            this.btnremove.TabIndex = 3;
            this.btnremove.Text = "Remove Items";
            this.btnremove.UseVisualStyleBackColor = false;
            this.btnremove.Click += new System.EventHandler(this.btnremove_Click);
            // 
            // btnupdate
            // 
            this.btnupdate.BackColor = System.Drawing.Color.RoyalBlue;
            this.btnupdate.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnupdate.ForeColor = System.Drawing.Color.White;
            this.btnupdate.Location = new System.Drawing.Point(20, 344);
            this.btnupdate.Name = "btnupdate";
            this.btnupdate.Size = new System.Drawing.Size(214, 65);
            this.btnupdate.TabIndex = 2;
            this.btnupdate.Text = "Update Items";
            this.btnupdate.UseVisualStyleBackColor = false;
            this.btnupdate.Click += new System.EventHandler(this.btnupdate_Click);
            // 
            // btnadd
            // 
            this.btnadd.BackColor = System.Drawing.Color.RoyalBlue;
            this.btnadd.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnadd.ForeColor = System.Drawing.Color.White;
            this.btnadd.Location = new System.Drawing.Point(20, 244);
            this.btnadd.Name = "btnadd";
            this.btnadd.Size = new System.Drawing.Size(214, 65);
            this.btnadd.TabIndex = 1;
            this.btnadd.Text = "Add Items";
            this.btnadd.UseVisualStyleBackColor = false;
            this.btnadd.Click += new System.EventHandler(this.btnadd_Click);
            // 
            // btnplaceorder
            // 
            this.btnplaceorder.BackColor = System.Drawing.Color.RoyalBlue;
            this.btnplaceorder.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnplaceorder.ForeColor = System.Drawing.Color.White;
            this.btnplaceorder.Location = new System.Drawing.Point(20, 140);
            this.btnplaceorder.Name = "btnplaceorder";
            this.btnplaceorder.Size = new System.Drawing.Size(214, 65);
            this.btnplaceorder.TabIndex = 0;
            this.btnplaceorder.Text = "Place Order";
            this.btnplaceorder.UseVisualStyleBackColor = false;
            this.btnplaceorder.Click += new System.EventHandler(this.btnplaceorder_Click_1);
            // 
            // panel2
            // 
            this.panel2.BackColor = System.Drawing.Color.White;
            this.panel2.Controls.Add(this.uc_welcome1);
            this.panel2.Controls.Add(this.uc_updateitems1);
            this.panel2.Controls.Add(this.uc_removeitem1);
            this.panel2.Controls.Add(this.uc_placeorder1);
            this.panel2.Controls.Add(this.uc_additems1);
            this.panel2.Location = new System.Drawing.Point(269, 12);
            this.panel2.Name = "panel2";
            this.panel2.Size = new System.Drawing.Size(1313, 1082);
            this.panel2.TabIndex = 1;
            // 
            // uc_welcome1
            // 
            this.uc_welcome1.Location = new System.Drawing.Point(15, 14);
            this.uc_welcome1.Name = "uc_welcome1";
            this.uc_welcome1.Size = new System.Drawing.Size(1280, 1035);
            this.uc_welcome1.TabIndex = 4;
            // 
            // uc_updateitems1
            // 
            this.uc_updateitems1.BackColor = System.Drawing.Color.White;
            this.uc_updateitems1.Location = new System.Drawing.Point(15, 14);
            this.uc_updateitems1.Name = "uc_updateitems1";
            this.uc_updateitems1.Size = new System.Drawing.Size(1280, 1035);
            this.uc_updateitems1.TabIndex = 3;
            // 
            // uc_removeitem1
            // 
            this.uc_removeitem1.BackColor = System.Drawing.Color.White;
            this.uc_removeitem1.Location = new System.Drawing.Point(24, 14);
            this.uc_removeitem1.Name = "uc_removeitem1";
            this.uc_removeitem1.Size = new System.Drawing.Size(1280, 1035);
            this.uc_removeitem1.TabIndex = 2;
            // 
            // uc_placeorder1
            // 
            this.uc_placeorder1.BackColor = System.Drawing.Color.White;
            this.uc_placeorder1.Location = new System.Drawing.Point(15, 14);
            this.uc_placeorder1.Name = "uc_placeorder1";
            this.uc_placeorder1.Size = new System.Drawing.Size(1280, 1035);
            this.uc_placeorder1.TabIndex = 1;
            // 
            // uc_additems1
            // 
            this.uc_additems1.BackColor = System.Drawing.Color.White;
            this.uc_additems1.Location = new System.Drawing.Point(15, 14);
            this.uc_additems1.Name = "uc_additems1";
            this.uc_additems1.Size = new System.Drawing.Size(1280, 1035);
            this.uc_additems1.TabIndex = 0;
            // 
            // Dashboard
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(9F, 20F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(41)))), ((int)(((byte)(44)))), ((int)(((byte)(51)))));
            this.ClientSize = new System.Drawing.Size(1594, 1106);
            this.Controls.Add(this.panel2);
            this.Controls.Add(this.panel1);
            this.FormBorderStyle = System.Windows.Forms.FormBorderStyle.None;
            this.Name = "Dashboard";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Dashboard";
            this.WindowState = System.Windows.Forms.FormWindowState.Maximized;
            this.Load += new System.EventHandler(this.Dashboard_Load);
            this.panel1.ResumeLayout(false);
            this.panel1.PerformLayout();
            this.panel2.ResumeLayout(false);
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.Panel panel1;
        private System.Windows.Forms.Button btnremove;
        private System.Windows.Forms.Button btnupdate;
        private System.Windows.Forms.Button btnadd;
        private System.Windows.Forms.Button btnplaceorder;
        private System.Windows.Forms.Panel panel2;
        private System.Windows.Forms.Button btnclose;
        private System.Windows.Forms.LinkLabel btnlogout;
        private AllUserControls.uc_additems uc_additems1;
        private AllUserControls.uc_placeorder uc_placeorder1;
        private AllUserControls.uc_removeitem uc_removeitem1;
        private AllUserControls.uc_updateitems uc_updateitems1;
        private AllUserControls.uc_welcome uc_welcome1;
    }
}