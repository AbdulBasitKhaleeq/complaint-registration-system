package www.abasit.com.afinal;

/**
 * Created by BasitKhaleeq on 4/8/2017.
 */

import android.app.Activity;
import android.content.Context;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.CheckBox;
import android.widget.ImageView;
import android.widget.TextView;

import java.util.List;

public class CustomAdapter extends BaseAdapter {
    final String TAG=this.getClass().getSimpleName();
    Context context;
    List<RowItem> rowItems;

    CustomAdapter(Context context, List<RowItem> rowItems) {
        this.context = context;
        this.rowItems = rowItems;
    }

    @Override
    public int getCount() {
        return rowItems.size();
    }

    @Override
    public Object getItem(int position) {
        return rowItems.get(position);
    }

    @Override
    public long getItemId(int position) {
        return rowItems.indexOf(getItem(position));
    }

    /* private view holder class */
    private class ViewHolder {
        ImageView profile_pic;
        TextView complaint_no;
        CheckBox status;
        TextView complaintdate;
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {

        ViewHolder holder = null;

        LayoutInflater mInflater = (LayoutInflater) context
                .getSystemService(Activity.LAYOUT_INFLATER_SERVICE);
        if (convertView == null) {
            convertView = mInflater.inflate(R.layout.layout_items, null);
            holder = new ViewHolder();

            holder.complaint_no = (TextView) convertView
                    .findViewById(R.id.layout_complaint_no);
            holder.profile_pic = (ImageView) convertView
                    .findViewById(R.id.layout_rgdcom_img1);
            holder.status = (CheckBox) convertView.findViewById(R.id.layout_complaint_Status);
            holder.complaintdate = (TextView) convertView
                    .findViewById(R.id.layout_complaint_date);
            Log.d(TAG, String.valueOf(holder.complaint_no));
            RowItem row_pos = rowItems.get(position);

          //  holder.profile_pic.setImageResource(row_pos.getProfile_pic_id());
            holder.complaint_no.setText(row_pos.getMember_name());
           // holder.status.setChecked(row_pos.getStatus());
            holder.complaintdate.setText(row_pos.getComDate());

            convertView.setTag(holder);
        } else {
            holder = (ViewHolder) convertView.getTag();
        }

        return convertView;
    }

}
