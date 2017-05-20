package www.abasit.com.afinal;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

import com.android.volley.RequestQueue;

public class Login extends AppCompatActivity {

    final String TAG=this.getClass().getSimpleName();

    Button login,register;
    TextView forgotpassword;
    private SessionManager session;
    RequestQueue mRequestQueue;   //checking that voley is connected?? yes connected
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        //creating relations
        login=(Button)findViewById(R.id.btnLogIn);
        register=(Button) findViewById(R.id.btnRegister);
        forgotpassword=(TextView)findViewById(R.id.txtFGpassword);
        session = new SessionManager(getApplicationContext());
        if(session.isLoggedIn()){
            Intent k = new Intent(Login.this, MainMenu.class);
            startActivity(k);
            finish();
        }


        //test code for voley library!!
       /* String url="https://www.google.com";

        StringRequest stringRequest=new StringRequest(url,new Response.Listener<String>(){

            @Override
            public void onResponse(String response) {
                Log.d(TAG,response);
            }
        },new Response.ErrorListener(){

            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(getApplicationContext(),"voley does not work here:(",Toast.LENGTH_LONG).show();
            }
        });







        MySingleton.getInstance(this).addToRequestQueue(stringRequest);
*/       //0----------------------test code ends here!!
        //onclick functions for the buttons
        login.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                // Perform action on click
                Intent k = new Intent(Login.this, LoginScreen.class);
                startActivity(k);
            }
        });

        register.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                // Perform action on click
                Intent k = new Intent(Login.this, RegisterActivity.class);
                startActivity(k);
            }
        });


    }
}
