using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.IO;
using System.Linq;
using System.Net;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace CloudSync
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            String tem = "1";
            if(textBox1.Text != "") {
                tem = textBox1.Text.Trim();
                Send(tem);  
            }
            else
            {
                MessageBox.Show("Enter a temp");
            }
            
            

        }

        public void Send(String temp)
        {
            //String Nodeurl = "http://localhost:8000/add?temp=" + temp;
            String Phpurl = "http://localhost/Temp.php?temp=" + temp;
            //String Cloudurl = "http://temp-shak.rhcloud.com/Temp.php?temp=" + temp;
            String url = Phpurl;
            HttpWebRequest request = (HttpWebRequest)WebRequest.Create(url);
            request.Method = "GET";
            request.ContentType = Text;


            String result = "Default";


            HttpWebResponse response = (HttpWebResponse)request.GetResponse();
            using (var streamReader = new StreamReader(response.GetResponseStream()))
            {
                result = streamReader.ReadToEnd();
                MessageBox.Show(result);
            }

        }
    }
}
