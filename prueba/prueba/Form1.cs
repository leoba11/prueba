using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace prueba
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void Button1_Click(object sender, EventArgs e)
        {
            ServiceReference1.ECCI_HolaMundoPortClient hola = new ServiceReference1.ECCI_HolaMundoPortClient();
            MessageBox.Show(hola.getPalabra());
        }

        private void Form1_Load(object sender, EventArgs e)
        {

        }

        private void Button1_Click_1(object sender, EventArgs e)
        {

        }

        private void Label1_Click(object sender, EventArgs e)
        {
            ServiceReference1.ECCI_HolaMundoPortClient animal = new ServiceReference1.ECCI_HolaMundoPortClient();
            label1.Text = animal.getPalabra();

        }
    }
}
