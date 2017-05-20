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

import java.text.DateFormat;
import java.util.Date;
import java.util.HashMap;
import java.util.Map;

public class RegisterComplaint extends AppCompatActivity implements AdapterView.OnItemSelectedListener {
    SessionManager session;
    EditText datetime,detils,address,location,latitude,logitude;
    Spinner category,district;
    Button register,back;
    int cate,dist;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register_complaint);

        String currentDateTimeString = DateFormat.getDateTimeInstance().format(new Date());
        category=(Spinner) findViewById(R.id.spComplaint_category);
        datetime=(EditText)findViewById(R.id.etComplaint_date_time);
        detils=(EditText)findViewById(R.id.etRegister_Complaint_details);
        district=(Spinner) findViewById(R.id.spComplaint_District);
        address=(EditText)findViewById(R.id.etComplaint_place_address);
        back=(Button)findViewById(R.id.btnComplaint_Back);
        //location=(EditText)findViewById(R.id.etComplaint_location_name);
        //latitude=(EditText)findViewById(R.id.etComplaint_latitude);
        //logitude=(EditText)findViewById(R.id.etCompalint_logitude);
        datetime.setText(currentDateTimeString);
        register=(Button)findViewById(R.id.btnComplaint_Register);
        session = new SessionManager(getApplicationContext());
        final String TAG= getClass().getSimpleName();
        final String url="http://inocentkillers.gear.host/api.php";

        // Session manager

        ArrayAdapter<CharSequence> adapter = ArrayAdapter.createFromResource(this,
                R.array.districts_array, android.R.layout.simple_spinner_item);
// Specify the layout to use when the list of choices appears
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
// Apply the adapter to the spinner
        district.setAdapter(adapter);


        ArrayAdapter<CharSequence> adapterA = ArrayAdapter.createFromResource(this,
                R.array.categories_array, android.R.layout.simple_spinner_item);
// Specify the layout to use when the list of choices appears
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
// Apply the adapter to the spinner
        category.setAdapter(adapterA);



        //on category selected this code will work
        category.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> adapterView, View v, int i, long l) {
                String item = adapterView.getItemAtPosition(i).toString();

                // Showing selected spinner item
                Toast.makeText(adapterView.getContext(), "Selected: " + i + " "+ item, Toast.LENGTH_LONG).show();
                cate=1+i;
            }

            @Override
            public void onNothingSelected(AdapterView<?> adapterView) {

            }
        });

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


        back.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                finish();
            }
        });

        final String cnic=session.getCNIC();
        final String app_id=session.getId();

        register.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                final String details=detils.getText().toString();
                final String addr=address.getText().toString();
     //   final String locat=location.getText().toString();
     //   final String lati=latitude.getText().toString();
     //   final String logi=logitude.getText().toString();*/
                Log.d(TAG, session.getCNIC()+ " "+ details);


               // if(details!="" && category!="" && addr!=""&& dist!=""&& locat!="" && lati!="" && logi!=""){


                // request string having method, url , responselinstener
                StringRequest stringRequest = new StringRequest(Request.Method.POST, url, new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        Log.d(TAG, response);
                        try {
                            JSONObject jsb = new JSONObject(response);
                            boolean error = jsb.getBoolean("error");
                            //Log.d(TAG,jsb.getString("cnic"));
                            if (!error) {

                                JSONObject complaint = jsb.getJSONObject("com");

                                String id = complaint.getString("id");
                                Toast.makeText(getApplicationContext(), "Complaint Registered\nId " + id, Toast.LENGTH_LONG).show();
                                Intent k = new Intent(RegisterComplaint.this, MainMenu.class);

                                startActivity(k);

                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                    }
                }, new Response.ErrorListener() {

                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(getApplicationContext(), "Error Complaint registration: ", Toast.LENGTH_LONG).show();
                    }
                }) {
                    @Override
                    protected Map<String, String> getParams() throws AuthFailureError {
                        Map<String, String> params = new HashMap<>();
                        params.put("tag", "registerComplaint");
                        params.put("cnic",cnic);
                        params.put("app_id",app_id);
                        params.put("details",details );
                        params.put("dept", Integer.toString(cate));
                        params.put("address",addr );
                        params.put("dist", Integer.toString(dist));
                      //  params.put("location", locat);
                      //  params.put("latitude", lati);
                      //  params.put("logitude", logi);
                        Log.d(TAG, String.valueOf(params));
                        return params;
                    }

                };

                //sending request to the server!
                MySingleton.getInstance(getApplicationContext()).addToRequestQueue(stringRequest);

            }

            /*else{
                    Toast.makeText(getApplicationContext(), "Please Enter details", Toast.LENGTH_LONG).show();
            }*/



        });

        }
    public void onItemSelected(AdapterView<?> parent, View view,
                               int pos, long id) {
        // An item was selected. You can retrieve the selected item using
        // parent.getItemAtPosition(pos)
        String item = parent.getItemAtPosition(pos).toString();

        // Showing selected spinner item
        Toast.makeText(parent.getContext(), "Selected: " + item, Toast.LENGTH_LONG).show();

    }

    public void onNothingSelected(AdapterView<?> parent) {
        // Another interface callback
    }
}
