package com.example.joserenato.desafio4.services;

import com.example.joserenato.desafio4.Images;
import com.example.joserenato.desafio4.Text;

import java.util.List;

import retrofit2.Call;
import retrofit2.http.GET;

/**
 * Created by JoseRenato on 20/05/2017.
 */

public interface Services {
    @GET("text")
    Call<List<Text>> getText();

    @GET("images")
    Call<List<Images>> getImages();
}
