package com.example.joserenato.desafio4;

import com.google.gson.annotations.SerializedName;

import java.io.Serializable;

/**
 * Created by JoseRenato on 20/05/2017.
 */

public class Images implements Serializable {

    @SerializedName("id_image")
    private String id_image;

    @SerializedName("route_image")
    private String route_image;

    @SerializedName("title_image")
    private String title_image;

    public String getId_image() {
        return id_image;
    }

    public void setId_image(String id_image) {
        this.id_image = id_image;
    }

    public String getRoute_image() {
        return route_image;
    }

    public void setRoute_image(String route_image) {
        this.route_image = route_image;
    }

    public String getTitle_image() {
        return title_image;
    }

    public void setTitle_image(String title_image) {
        this.title_image = title_image;
    }
}
