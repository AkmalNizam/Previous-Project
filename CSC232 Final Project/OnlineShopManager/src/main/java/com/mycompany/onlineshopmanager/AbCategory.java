/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.onlineshopmanager;

/**
 *
 * @author Akmal Nizam
 */
public abstract class AbCategory{

    private double price;
    private int quantity;

    public AbCategory(double pr, int q){
        this.price=pr;
        this.quantity=q;
    }
    public abstract double getSum();

    public String toString(){
        return "Price : RM "+this.price+" Quantity : "+this.quantity;
    }
    public double getPrice(){return price;}
    public int getQuantity(){return quantity;}
}

class Electronic_Devices extends AbCategory{
    private double sum=0.00;
    
    public Electronic_Devices(double pr, int q){
        super(pr, q);
    }

    public double getSum(){
        return sum+(getPrice()*getQuantity());
    }
}

class Health_Beauty extends AbCategory{
    private double sum=0.00;

    public Health_Beauty(double pr, int q){
        super(pr, q);
    }

    public double getSum(){
        return sum+(getPrice()*getQuantity());
    }
}

class Home_Appliances extends AbCategory{
    private double sum=0.00;

    public Home_Appliances(double pr, int q){
        super(pr, q);
    }
    
    public double getSum(){
        return sum+(getPrice()*getQuantity());
    }
}

class Men_Fashion extends AbCategory{
    private double sum=0.00;

    public Men_Fashion(double pr, int q){
        super(pr, q);
    }
    
    public double getSum(){
        return sum+(getPrice()*getQuantity());
    }
}

class Women_Fashion extends AbCategory{
    private double sum=0.00;

    public Women_Fashion(double pr, int q){
        super(pr, q);
    }
    
    public double getSum(){
        return sum+(getPrice()*getQuantity());
    }
}