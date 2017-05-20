package www.abasit.com.afinal;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class LoginScreen extends AppCompatActivity {

    //getting screen elements
    Button btn_login;
    private SessionManager session;
    EditText et_cnic,et_password;

    //TAG used in request sending process and LOG.d
    final String TAG=this.getClass().getSimpleName();


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login_screen);
        et_password=(EditText) findViewById(R.id.etLoin_password);
        et_cnic=(EditText)findViewById(R.id.etLogin_cnic);
        btn_login=(Button)findViewById(R.id.btn_login_loginbtn);
        session = new SessionManager(getApplicationContext());

        // Check if user is already logged in or not



        btn_login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                final String pass=et_password.getText().toString();
                final String cnic=et_cnic.getText().toString();
                //url where the data will go
                final String url="http://inocentkillers.gear.host/api.php";
                // Session manager


                // request string having method, url , responselinstener
                StringRequest stringRequest=new StringRequest(Request.Method.POST,url,new Response.Listener<String>(){

                    @Override
                    public void onResponse(String response) {
                        Log.d(TAG,response);
                        try{
                            JSONObject jsb=new JSONObject(response);
                            boolean error=jsb.getBoolean("error");
                            //Log.d(TAG,jsb.getString("cnic"));
                            if(!error){

                                JSONObject complaint=jsb.getJSONObject("app");
                                String NIC=complaint.getString("cnic");
                                String na=complaint.getString("name");
                                String id=complaint.getString("id");
                                session.setLogin(true,id,na,NIC);
                                Toast.makeText(getApplicationContext(),"user matched: "+na +" " +NIC ,Toast.LENGTH_LONG).show();
                                Intent k = new Intent(LoginScreen.this, MainMenu.class);
                                k.putExtra("na",na);
                                k.putExtra("cn",NIC);
                                k.putExtra("id",id);

                                startActivity(k);

                            }
                        }
                        catch (JSONException e) {
                            e.printStackTrace();
                        }
                    }
                },new Response.ErrorListener(){

                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(getApplicationContext(),"Error in Log in response: ",Toast.LENGTH_LONG).show();
                    }
                }){
                    @Override
                    protected Map<String, String> getParams() throws AuthFailureError {
                        Map<String,String> params= new HashMap<>();
                        params.put("tag","login");
                        params.put("cnic",cnic);
                        params.put("password",pass);
                        return params;
                    }

                };

                //sending request to the server!
                MySingleton.getInstance(getApplicationContext()).addToRequestQueue(stringRequest);






            }
        });



    }
}
