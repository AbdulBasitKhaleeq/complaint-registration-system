package www.abasit.com.afinal;

import android.app.ListActivity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.ListView;

/**
 * Created by BasitKhaleeq on 2/12/2017.
 */
public class ListShow extends ListActivity {

    String Districts[]={"a","b"};

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

            setListAdapter(new ArrayAdapter<String>(this, android.R.layout.simple_list_item_1, Districts));

    }



    protected void onListItemClick(ListView lv, View v, int position, long id){
        super.onListItemClick(lv,v,position,id);
        String dis= Districts[position];
        try{
            Class selected=Class.forName("www.abasit.com.afinal"+dis);
            Intent selectedIntent=new Intent(this, selected);
            startActivity(selectedIntent);

        } catch (ClassNotFoundException e) {
            e.printStackTrace();
        }


    }


    @Override
    protected void onPause() {
        super.onPause();
        finish();
    }

}
