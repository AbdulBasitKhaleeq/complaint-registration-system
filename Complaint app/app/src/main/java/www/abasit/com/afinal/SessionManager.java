package www.abasit.com.afinal;

import android.content.Context;
import android.content.SharedPreferences;
import android.util.Log;

/**
 * Created by BasitKhaleeq on 3/15/2017.
 */
public class SessionManager {
    // LogCat tag
    private static String TAG = SessionManager.class.getSimpleName();

    // Shared Preferences
    SharedPreferences pref;

    SharedPreferences.Editor editor;
    Context _context;

    // Shared pref mode
    int PRIVATE_MODE = 0;

    // Shared preferences file name
    private static final String PREF_NAME = "LoginPREf";

    private static final String KEY_IS_LOGGEDIN = "isLoggedIn";
    private static final String KEY_id = "id";
    private static final String KEY_Name = "name";
    private static final String KEY_CNIC = "cnic";

    public SessionManager(Context context) {
        this._context = context;
        pref = _context.getSharedPreferences(PREF_NAME, PRIVATE_MODE);
        editor = pref.edit();
    }

    public void setLogin(boolean isLoggedIn,String id,String Name,String CNIC) {

        editor.putBoolean(KEY_IS_LOGGEDIN, isLoggedIn);
        editor.putString(KEY_id,id);
        editor.putString(KEY_Name,Name);
        editor.putString(KEY_CNIC,CNIC);

        // commit changes
        editor.commit();

        Log.d(TAG, "User login session modified!");
    }


    public boolean isLoggedIn()
    {
        return pref.getBoolean(KEY_IS_LOGGEDIN, false);
    }

    public boolean LogOut()
    {
        editor.clear();
        editor.putBoolean(KEY_IS_LOGGEDIN,false);
        editor.commit();
        return true;
    }


    public String getName(){
        return pref.getString(KEY_Name,null);
    }
    public String getId(){
        return pref.getString(KEY_id,null);
    }
    public String getCNIC(){
        return pref.getString(KEY_CNIC,null);
    }


}