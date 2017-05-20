package www.abasit.com.afinal;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;
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

public class RegisterActivity extends AppCompatActivity {
private SessionManager session;
    EditText name,password,com_password,cnic,mobile,email;
    Button regist;
    int dist;
    Spinner district;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);
        //TAG used in request sending process and LOG.d
        final String TAG=this.getClass().getSimpleName();

        name=(EditText)findViewById(R.id.etRegister_Name);
        password=(EditText)findViewById(R.id.etRegister_password);
        com_password=(EditText)findViewById(R.id.etRegister_password_Conform);
        cnic=(EditText)findViewById(R.id.etRegister_CNIC);
        district=(Spinner)findViewById(R.id.etRegister_District);
        mobile=(EditText)findViewById(R.id.etRegisterMobileNumber);
        email=(EditText)findViewById(R.id.etRegister_Email);
        regist=(Button)findViewById(R.id.btnRegister_register);


        ArrayAdapter<CharSequence> adapter = ArrayAdapter.createFromResource(this,
                R.array.districts_array, android.R.layout.simple_spinner_item);
// Specify the layout to use when the list of choices appears
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
// Apply the adapter to the spinner
        district.setAdapter(adapter);

        district.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> adapterView, View v, int i, long l) {
                String item = adapterView.getItemAtPosition(i).toString();
                dist=1+i;
                // Showing selected spinner item
                Toast.makeText(adapterView.getContext(), "Selected: " + i + " "+ item, Toast.LENGTH_LONG).show();

            }

            @Override
            public void onNothingSelected(AdapterView<?> adapterView) {

            }
        });

        session = new SessionManager(getApplicationContext());

        // Check if user is already logged in or not


                regist.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                // Perform action on click
                final String pass=password.getText().toString();
                final String a=com_password.getText().toString();
                if(pass.equals(a) ){

                    final String n= name.getText().toString();
                    final String cni=cnic.getText().toString();
                  //  final  String dis=district.getText().toString();
                    final String mail=email.getText().toString();
                   // final String dist=district.getText().toString();
                    final String mob=mobile.getText().toString();
                    Toast.makeText(RegisterActivity.this, "This is my Toast message!",
                            Toast.LENGTH_LONG).show();



                    final String url="http://inocentkillers.gear.host/api.php";

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
                                    JSONObject complaint=jsb.getJSONObject("user");
                                    String NIC=complaint.getString("cnic");
                                    String na=complaint.getString("fname");
                                    String id=complaint.getString("id");
                                    session.setLogin(true,id,na,NIC);
                                    Toast.makeText(getApplicationContext(),"user matched: "+na +" " +NIC ,Toast.LENGTH_LONG).show();
                                    Intent k = new Intent(RegisterActivity.this, MainMenu.class);
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
                            Toast.makeText(getApplicationContext(),"Error in Register activity response: ",Toast.LENGTH_LONG).show();
                        }
                    }){
                        @Override
                        protected Map<String, String> getParams() throws AuthFailureError {
                            Map<String,String> params= new HashMap<>();
                            params.put("tag","registerApplicant");
                            params.put("fname",n);
                            params.put("cnic",cni);
                            params.put("email",mail);
                            params.put("password",pass);
                            params.put("contact_no",mob);
                            params.put("location",Integer.toString(dist));
                            Log.d(TAG,String.valueOf(params));
                            return params;
                        }

                    };

                    //sending request to the server!
                    MySingleton.getInstance(getApplicationContext()).addToRequestQueue(stringRequest);

                }
                else{
                    Toast.makeText(RegisterActivity.this, "Password not matched!!",
                            Toast.LENGTH_LONG).show();
            }
            }
        });


    }
}
