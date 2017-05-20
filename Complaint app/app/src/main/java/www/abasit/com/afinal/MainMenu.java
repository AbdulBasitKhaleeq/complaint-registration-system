package www.abasit.com.afinal;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageButton;
import android.widget.ImageView;
import android.widget.TextView;

public class MainMenu extends AppCompatActivity {

    ImageView userImage;
    TextView userName;
    ImageButton newCom, regCom, logout, help;
    private SessionManager session;
    @Override
    protected void onCreate(Bundle savedInstanceState) {

        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main_menu);
        // now we will connect the layout objects with this java class.
        userImage=(ImageView)findViewById(R.id.imgUserpic);
        userName=(TextView)findViewById(R.id.txt_Main_User_NAME);
        newCom=(ImageButton)findViewById(R.id.imgBtn_NewCom);
        regCom=(ImageButton)findViewById(R.id.imgBtn_Reg_com);
        logout=(ImageButton)findViewById(R.id.imgBtn_logout);
        help=(ImageButton)findViewById(R.id.imgBtn_help);

        session=new SessionManager(getApplicationContext());
        //here we are getting data from login activity
        String name,id,CNIC;
        name= session.getName();
        id=session.getId();
        CNIC=session.getCNIC();
            //Bundle extras = i.getExtras();

              //  name= extras.getString("na");
              //  id= extras.getString("id");
               // CNIC= extras.getString("cn");

        //---------------data received in "name, id , CNIC" veriables
        userName.setText(name);
        //Now we will move towords other functionalities

        newCom.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                Intent complaintActivity=new Intent(MainMenu.this,RegisterComplaint.class);
                startActivity(complaintActivity);
            }
        } );

        regCom.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                Intent complaintActivity=new Intent(MainMenu.this,RegisteredComplaints.class);
                startActivity(complaintActivity);
            }
        } );


        help.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                Intent complaintActivity=new Intent(MainMenu.this,Help.class);
                startActivity(complaintActivity);
            }
        } );




        logout.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
               session.LogOut();
                finish();
                //Intent complaintActivity=new Intent(MainMenu.this,LoginScreen.class);
                //startActivity(complaintActivity);
            }
        } );




    }
}
