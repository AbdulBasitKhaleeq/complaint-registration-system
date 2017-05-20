package www.abasit.com.afinal;

import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

/**
 * Created by BasitKhaleeq on 4/8/2017.
 */
public class RegisteredComplaints extends AppCompatActivity  implements AdapterView.OnItemSelectedListener{

    private SessionManager session;
    /*String[] member_names;implements AdapterView.OnItemClickListener
    TypedArray profile_pics;
    String[] statues;
    String[] contactType;*/

    List<RowItem> rowItems;
    ListView mylistview;


    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_registered_complaints);
        rowItems = new ArrayList<RowItem>();
        final String TAG=this.getClass().getSimpleName();

        session = new SessionManager(getApplicationContext());
       final String id;
        id=session.getId();
        Log.d(TAG,"user id is "+id);
        final String url="http://inocentkillers.gear.host/api.php";
        mylistview = (ListView) findViewById(R.id.list);
        final CustomAdapter adapter = new CustomAdapter(this, rowItems);
        mylistview.setAdapter(adapter);

        // mylistview.setOnItemClickListener((AdapterView.OnItemClickListener) this);
      //  member_names = getResources().getStringArray(R.array.Member_names);

      //  profile_pics = getResources().obtainTypedArray(R.array.profile_pics);

     //   statues = getResources().getStringArray(R.array.statues);

      //  contactType = getResources().getStringArray(R.array.contactType);




        StringRequest stringRequest = new StringRequest(Request.Method.POST, url, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                //Log.d(TAG, response);
                try {
                    JSONObject jsb = new JSONObject(response);
                    boolean error = jsb.getBoolean("error");
                    int count=jsb.getInt("count");
                    boolean state=true;
                    Toast.makeText(getApplicationContext(), "total complaints " +count, Toast.LENGTH_LONG).show();
                    RowItem item;
                    if (!error) {
                    for (int i=0;i<count;i++) {
                        JSONObject  complaint=jsb.getJSONObject("com"+i);
                        Log.d(TAG, "complaint id for com0:"+ complaint.getString("com_no"));
                        String id = complaint.getString("com_no");
                        String date=complaint.getString("complaint_date");
                        String status=complaint.getString("complaint_status");
                        Log.d(TAG, "complaint id"+id+" "+ date);
                        //String photo=complaint[i].getString("photo");
                        if(status=="Qeued")
                            state=false;
                        item = new RowItem(id, 1 ,state ,date);
                        rowItems.add(item);
                        adapter.notifyDataSetChanged();

                   }




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
                params.put("tag", "registeredComplaints");
                params.put("app_id",id);
               // Log.d(TAG, String.valueOf(params));
                return params;
            }

        };

        //sending request to the server!
        MySingleton.getInstance(getApplicationContext()).addToRequestQueue(stringRequest);



            /*else{
                    Toast.makeText(getApplicationContext(), "Please Enter details", Toast.LENGTH_LONG).show();
            }*/



    }


    @Override
    public void onItemSelected(AdapterView<?> adapterView, View view, int i, long l) {
        String member_name = rowItems.get(i).getMember_name();
        Toast.makeText(getApplicationContext(), "" + member_name,
                Toast.LENGTH_SHORT).show();
    }

    @Override
    public void onNothingSelected(AdapterView<?> adapterView) {

    }
}

