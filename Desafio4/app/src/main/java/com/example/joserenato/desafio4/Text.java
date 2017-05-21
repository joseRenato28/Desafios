package com.example.joserenato.desafio4;

import com.google.gson.annotations.SerializedName;

import java.io.Serializable;

/**
 * Created by JoseRenato on 20/05/2017.
 */

public class Text implements Serializable {
    @SerializedName("main_text")
    private String main_text;

    @SerializedName("color_text")
    private String color_text;

    public Text(){

    }

    public String getMain_text() {
        return main_text;
    }

    public void setMain_text(String main_text) {
        this.main_text = main_text;
    }

    public String getColor_text() {
        return color_text;
    }

    public void setColor_text(String color_text) {
        this.color_text = color_text;
    }
}
