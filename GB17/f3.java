package com.DAO;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;
import java.util.List;

import com.entity.Note;
import com.entity.UserDetails;

public class PostDAO {

    private Connection conn;

    public PostDAO(Connection conn) {
        super();
        this.conn = conn;
    }

    public boolean AddNotes(String ti, String co, int ui, String time, String fileName) {
        boolean f = false;
        try {
            String qu = "insert into notes(title,content,pdate,userid,filename) values(?,?,?,?,?)";

            PreparedStatement ps = conn.prepareStatement(qu);
            ps.setString(1, ti);
            ps.setString(2, co);
            ps.setString(3, time);
            ps.setInt(4, ui);
            ps.setString(5, fileName);

            int i = ps.executeUpdate();
            if (i == 1) {
                f = true;
            }

        } catch (Exception e) {
            e.printStackTrace();
        }

        return f;
    }

    public List<Note> getData(int id) {
        List<Note> list = new ArrayList<Note>();
        Note po = null;
        try {

            String qu = "select * from notes where userid=? order by id DESC";
            PreparedStatement ps = conn.prepareStatement(qu);
            ps.setInt(1, id);

            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                po = new Note();
                po.setId(rs.getInt(1));
                po.setTitle(rs.getString(2));
                po.setContent(rs.getString(3));
                po.setPdate(rs.getString(4));
                po.setUserId(rs.getInt(5));
                po.setFileName(rs.getString(6));
                list.add(po);
            }

        } catch (Exception e) {

        }

        return list;
    }

    public Note getDataById(int noteId) {
        Note po = null;
        try {
            String qu = "select * from notes where id=?";

            PreparedStatement ps = conn.prepareStatement(qu);
            ps.setInt(1, noteId);

            ResultSet rs = ps.executeQuery();

            if (rs.next()) {
                po = new Note();
                po.setId(rs.getInt(1));
                po.setTitle(rs.getString(2));
                po.setContent(rs.getString(3));
                po.setPdate(rs.getString(4));
                po.setUserId(rs.getInt(5));
                po.setFileName(rs.getString(6));
            }

        } catch (Exception e) {
            e.printStackTrace();
        }

        return po;
    }

    public boolean PostUpdate(int nid, String ti, String co, String time, String fileName) {
        boolean f = false;

        try {
            String qu = "update notes set title=?,content=?,pdate=?,filename=? where id=?";
            PreparedStatement ps = conn.prepareStatement(qu);
            ps.setString(1, ti);
            ps.setString(2, co);
            ps.setString(3, time);
            ps.setString(4, fileName);
            ps.setInt(5, nid);
            int i = ps.executeUpdate();

            if (i == 1) {
                f = true;
            }

        } catch (Exception e) {
            e.printStackTrace();
        }

        return f;
    }

    public boolean DeleteNotes(int nid) {
        boolean f = false;

        try {

            String qu = "delete from notes where id=?";
            PreparedStatement ps = conn.prepareStatement(qu);
            ps.setInt(1, nid);
            int x = ps.executeUpdate();
            if (x == 1) {
                f = true;
            }

        } catch (Exception e) {
            e.printStackTrace();
        }

        return f;
    }

    public List<Note> getDataBySearch(String ch, int uid) {
        List<Note> list = new ArrayList<Note>();
        Note po = null;
        try {

            String qu = "select * from notes where title like ? and userid=? order by id DESC";
            PreparedStatement ps = conn.prepareStatement(qu);
            ps.setString(1, "%" + ch + "%");
            ps.setInt(2, uid);

            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                po = new Note();
                po.setId(rs.getInt(1));
                po.setTitle(rs.getString(2));
                po.setContent(rs.getString(3));
                po.setPdate(rs.getString(4));
                po.setUserId(rs.getInt(5));
                po.setFileName(rs.getString(6));
                list.add(po);
            }

        } catch (Exception e) {

        }

        return list;
    }

    public List<Note> getAllNotes() {
        List<Note> list = new ArrayList<Note>();
        Note po = null;
        try {

            String qu = "select * from notes order by id DESC";
            PreparedStatement ps = conn.prepareStatement(qu);

            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                po = new Note();
                po.setId(rs.getInt(1));
                po.setTitle(rs.getString(2));
                po.setContent(rs.getString(3));
                po.setPdate(rs.getString(4));
                po.setUserId(rs.getInt(5));
                po.setFileName(rs.getString(6));
                list.add(po);
            }
        } catch (Exception e) {
            e.printStackTrace();
        }

        return list;
    }

}