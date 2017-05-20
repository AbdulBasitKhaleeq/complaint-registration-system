package www.abasit.com.afinal;

/**
 * Created by BasitKhaleeq on 4/8/2017.
 */
public class RowItem {

    private String id;
    private int profile_pic_id;
    private boolean status;
    private String datee;

    public RowItem(String com_no, int profile_pic_id, boolean status,
                   String comdate) {

        this.id = com_no;
        this.profile_pic_id = profile_pic_id;
        this.status = status;
        this.datee = comdate;
    }

    public String getMember_name() {
        return id;
    }

    public void setMember_name(String com_no) {
        this.id = com_no;
    }

    public int getProfile_pic_id() {
        return profile_pic_id;
    }

    public void setProfile_pic_id(int profile_pic_id) {
        this.profile_pic_id = profile_pic_id;
    }

    public boolean getStatus() {
        return status;
    }

    public void setStatus(boolean status) {
        this.status = status;
    }

    public String getComDate() {
        return datee;
    }

    public void setComDate(String contactType) {
        this.datee = contactType;
    }

}
