package com.mycompany.onlineshopmanager;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.text.DecimalFormat;
import java.util.ArrayList;
import java.util.Collections;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.table.DefaultTableModel;


public class Sales extends javax.swing.JFrame {

    DecimalFormat myFormatter = new DecimalFormat("RM ##.00");
    
    public Sales() {
        initComponents();
        tblSales.setAutoCreateRowSorter(true);   
    }

    public void getSum(){
        int rowsCount = tblSales.getRowCount();
        double sumED = 0.00,sumHB = 0.00,sumHA = 0.00,sumMF = 0.00,sumWF = 0.00;
        for(int i = 0; i < rowsCount; i++){
            if(tblSales.getValueAt(i,1).equals("Electronic Devices")){
                sumED = sumED + (Double.parseDouble(tblSales.getValueAt(i, 2).toString())*Integer.parseInt(tblSales.getValueAt(i, 3).toString()));
            }
            if(tblSales.getValueAt(i,1).equals("Health Beauty")){
                sumHB = sumHB + (Double.parseDouble(tblSales.getValueAt(i, 2).toString())*Integer.parseInt(tblSales.getValueAt(i, 3).toString()));
            }
            if(tblSales.getValueAt(i,1).equals("Home Appliances")){
                sumHA = sumHA + (Double.parseDouble(tblSales.getValueAt(i, 2).toString())*Integer.parseInt(tblSales.getValueAt(i, 3).toString()));
            }
            if(tblSales.getValueAt(i,1).equals("Men Fashion")){
                sumMF = sumMF + (Double.parseDouble(tblSales.getValueAt(i, 2).toString())*Integer.parseInt(tblSales.getValueAt(i, 3).toString()));
            }
            if(tblSales.getValueAt(i,1).equals("Women Fashion")){
                sumWF = sumWF + (Double.parseDouble(tblSales.getValueAt(i, 2).toString())*Integer.parseInt(tblSales.getValueAt(i, 3).toString()));
            }
        }
        
        String SsumED = myFormatter.format(sumED);
        tfEDSum.setText(SsumED);
        String SsumHB = myFormatter.format(sumHB);
        tfHBSum.setText(SsumHB);
        String SsumHA = myFormatter.format(sumHA);
        tfHASum.setText(SsumHA);
        String SsumMF = myFormatter.format(sumMF);
        tfMFSum.setText(SsumMF);
        String SsumWF = myFormatter.format(sumWF);
        tfWFSum.setText(SsumWF);
    }
    
    public void getMaxMin(){
        ArrayList<Double> ED_list = new ArrayList<Double>();
        ArrayList<Double> HB_list = new ArrayList<Double>();
        ArrayList<Double> HA_list = new ArrayList<Double>();
        ArrayList<Double> MF_list = new ArrayList<Double>();
        ArrayList<Double> WF_list = new ArrayList<Double>();
        for(int i = 0; i < tblSales.getRowCount(); i++){
            if(tblSales.getValueAt(i,1).equals("Electronic Devices")){
                ED_list.add(Double.parseDouble(tblSales.getValueAt(i, 2).toString())*Integer.parseInt(tblSales.getValueAt(i, 3).toString()));   
            }
            if(tblSales.getValueAt(i,1).equals("Health Beauty")){
                HB_list.add(Double.parseDouble(tblSales.getValueAt(i, 2).toString())*Integer.parseInt(tblSales.getValueAt(i, 3).toString()));   
            }
            if(tblSales.getValueAt(i,1).equals("Home Appliances")){
                HA_list.add(Double.parseDouble(tblSales.getValueAt(i, 2).toString())*Integer.parseInt(tblSales.getValueAt(i, 3).toString()));   
            }
            if(tblSales.getValueAt(i,1).equals("Men Fashion")){
                MF_list.add(Double.parseDouble(tblSales.getValueAt(i, 2).toString())*Integer.parseInt(tblSales.getValueAt(i, 3).toString()));   
            }
            if(tblSales.getValueAt(i,1).equals("Women Fashion")){
                WF_list.add(Double.parseDouble(tblSales.getValueAt(i, 2).toString())*Integer.parseInt(tblSales.getValueAt(i, 3).toString()));   
            }
            
        }
        double maxED = Collections.max(ED_list);
        double minED = Collections.min(ED_list);
        String SmaxED = myFormatter.format(maxED);
        String SminED = myFormatter.format(minED);
        tfEDMax.setText(SmaxED);
        tfEDMin.setText(SminED);
        
        double maxHB = Collections.max(HB_list);
        double minHB = Collections.min(HB_list);
        String SmaxHB = myFormatter.format(maxHB);
        String SminHB = myFormatter.format(minHB);
        tfHBMax.setText(SmaxHB);
        tfHBMin.setText(SminHB);
        
        double maxHA = Collections.max(HA_list);
        double minHA = Collections.min(HA_list);
        String SmaxHA = myFormatter.format(maxHA);
        String SminHA = myFormatter.format(minHA);
        tfHAMax.setText(SmaxHA);
        tfHAMin.setText(SminHA);
        
        double maxMF = Collections.max(MF_list);
        double minMF = Collections.min(MF_list);
        String SmaxMF = myFormatter.format(maxMF);
        String SminMF = myFormatter.format(minMF);
        tfMFMax.setText(SmaxMF);
        tfMFMin.setText(SminMF);
        
        double maxWF = Collections.max(WF_list);
        double minWF = Collections.min(WF_list);
        String SmaxWF = myFormatter.format(maxWF);
        String SminWF = myFormatter.format(minWF);
        tfWFMax.setText(SmaxWF);
        tfWFMin.setText(SminWF);
    }
    
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        Sales1 = new javax.swing.JPanel();
        jLabel6 = new javax.swing.JLabel();
        MONTH = new javax.swing.JLabel();
        jbImport = new javax.swing.JButton();
        cbMonth = new javax.swing.JComboBox<>();
        jLabel3 = new javax.swing.JLabel();
        jLabel4 = new javax.swing.JLabel();
        jLabel5 = new javax.swing.JLabel();
        jLabel7 = new javax.swing.JLabel();
        jLabel8 = new javax.swing.JLabel();
        tfEDMax = new javax.swing.JTextField();
        jLabel9 = new javax.swing.JLabel();
        jLabel10 = new javax.swing.JLabel();
        jLabel13 = new javax.swing.JLabel();
        tfEDMin = new javax.swing.JTextField();
        tfEDSum = new javax.swing.JTextField();
        jLabel15 = new javax.swing.JLabel();
        jLabel16 = new javax.swing.JLabel();
        jLabel17 = new javax.swing.JLabel();
        jLabel20 = new javax.swing.JLabel();
        jLabel21 = new javax.swing.JLabel();
        jLabel22 = new javax.swing.JLabel();
        jLabel24 = new javax.swing.JLabel();
        jLabel25 = new javax.swing.JLabel();
        jLabel26 = new javax.swing.JLabel();
        jLabel28 = new javax.swing.JLabel();
        jLabel29 = new javax.swing.JLabel();
        jLabel30 = new javax.swing.JLabel();
        tfHBMin = new javax.swing.JTextField();
        tfHBSum = new javax.swing.JTextField();
        tfHBMax = new javax.swing.JTextField();
        tfHAMax = new javax.swing.JTextField();
        tfHAMin = new javax.swing.JTextField();
        tfHASum = new javax.swing.JTextField();
        tfMFSum = new javax.swing.JTextField();
        tfMFMin = new javax.swing.JTextField();
        tfMFMax = new javax.swing.JTextField();
        tfWFSum = new javax.swing.JTextField();
        tfWFMax = new javax.swing.JTextField();
        tfWFMin = new javax.swing.JTextField();
        jbCalculate = new javax.swing.JButton();
        jbClear = new javax.swing.JButton();
        jScrollPane1 = new javax.swing.JScrollPane();
        tblSales = new javax.swing.JTable();
        jPanel1 = new javax.swing.JPanel();
        jSeparator1 = new javax.swing.JSeparator();
        jLabel11 = new javax.swing.JLabel();
        jLabel12 = new javax.swing.JLabel();
        jbCategory = new javax.swing.JButton();
        jbCustInfo = new javax.swing.JButton();
        jbSales = new javax.swing.JButton();
        jbPos = new javax.swing.JButton();
        jbExit = new javax.swing.JButton();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);

        Sales1.setBorder(javax.swing.BorderFactory.createTitledBorder(null, "SALES", javax.swing.border.TitledBorder.DEFAULT_JUSTIFICATION, javax.swing.border.TitledBorder.DEFAULT_POSITION, new java.awt.Font("MS UI Gothic", 1, 18))); // NOI18N
        Sales1.setForeground(new java.awt.Color(255, 0, 0));
        Sales1.setFont(new java.awt.Font("Tahoma", 1, 12)); // NOI18N

        MONTH.setText("MONTH :");

        jbImport.setText("Import");
        jbImport.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jbImportActionPerformed(evt);
            }
        });

        cbMonth.setModel(new javax.swing.DefaultComboBoxModel<>(new String[] { "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" }));

        jLabel3.setText("Electronic Devices:");

        jLabel4.setText("Health Beauty");

        jLabel5.setText("Home Appliances");

        jLabel7.setText("Men Fashion :");

        jLabel8.setText("Women Fashion:");

        tfEDMax.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        tfEDMax.setBorder(null);
        tfEDMax.setPreferredSize(new java.awt.Dimension(60, 20));

        jLabel9.setText("Max.");

        jLabel10.setText("Min.");

        jLabel13.setText("Sum.");

        tfEDMin.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        tfEDMin.setBorder(null);
        tfEDMin.setPreferredSize(new java.awt.Dimension(60, 20));

        tfEDSum.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        tfEDSum.setBorder(null);
        tfEDSum.setPreferredSize(new java.awt.Dimension(60, 20));

        jLabel15.setText("Max.");

        jLabel16.setText("Min.");

        jLabel17.setText("Sum.");

        jLabel20.setText("Max.");

        jLabel21.setText("Min.");

        jLabel22.setText("Sum.");

        jLabel24.setText("Max.");

        jLabel25.setText("Min.");

        jLabel26.setText("Sum.");

        jLabel28.setText("Max.");

        jLabel29.setText("Min.");

        jLabel30.setText("Sum.");

        tfHBMin.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        tfHBMin.setBorder(null);
        tfHBMin.setPreferredSize(new java.awt.Dimension(60, 20));

        tfHBSum.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        tfHBSum.setBorder(null);
        tfHBSum.setPreferredSize(new java.awt.Dimension(60, 20));

        tfHBMax.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        tfHBMax.setBorder(null);
        tfHBMax.setPreferredSize(new java.awt.Dimension(60, 20));

        tfHAMax.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        tfHAMax.setBorder(null);
        tfHAMax.setPreferredSize(new java.awt.Dimension(60, 20));

        tfHAMin.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        tfHAMin.setBorder(null);
        tfHAMin.setPreferredSize(new java.awt.Dimension(60, 20));
        tfHAMin.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                tfHAMinActionPerformed(evt);
            }
        });

        tfHASum.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        tfHASum.setBorder(null);
        tfHASum.setPreferredSize(new java.awt.Dimension(60, 20));

        tfMFSum.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        tfMFSum.setBorder(null);
        tfMFSum.setPreferredSize(new java.awt.Dimension(60, 20));

        tfMFMin.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        tfMFMin.setBorder(null);
        tfMFMin.setPreferredSize(new java.awt.Dimension(60, 20));

        tfMFMax.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        tfMFMax.setBorder(null);
        tfMFMax.setPreferredSize(new java.awt.Dimension(60, 20));

        tfWFSum.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        tfWFSum.setBorder(null);
        tfWFSum.setPreferredSize(new java.awt.Dimension(60, 20));

        tfWFMax.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        tfWFMax.setBorder(null);
        tfWFMax.setPreferredSize(new java.awt.Dimension(60, 20));

        tfWFMin.setFont(new java.awt.Font("Tahoma", 0, 12)); // NOI18N
        tfWFMin.setBorder(null);
        tfWFMin.setPreferredSize(new java.awt.Dimension(60, 20));

        jbCalculate.setText("Calculate");
        jbCalculate.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jbCalculateActionPerformed(evt);
            }
        });

        jbClear.setText("Clear");
        jbClear.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jbClearActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout Sales1Layout = new javax.swing.GroupLayout(Sales1);
        Sales1.setLayout(Sales1Layout);
        Sales1Layout.setHorizontalGroup(
            Sales1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(Sales1Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(Sales1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(Sales1Layout.createSequentialGroup()
                        .addGroup(Sales1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                            .addGroup(javax.swing.GroupLayout.Alignment.LEADING, Sales1Layout.createSequentialGroup()
                                .addGap(10, 10, 10)
                                .addComponent(MONTH)
                                .addGap(31, 31, 31)
                                .addComponent(cbMonth, 0, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                            .addGroup(javax.swing.GroupLayout.Alignment.LEADING, Sales1Layout.createSequentialGroup()
                                .addGap(21, 21, 21)
                                .addComponent(jbImport, javax.swing.GroupLayout.PREFERRED_SIZE, 80, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addGap(18, 18, 18)
                                .addComponent(jbCalculate, javax.swing.GroupLayout.PREFERRED_SIZE, 80, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addGap(18, 18, 18)
                                .addComponent(jbClear, javax.swing.GroupLayout.PREFERRED_SIZE, 80, javax.swing.GroupLayout.PREFERRED_SIZE)))
                        .addGap(0, 0, Short.MAX_VALUE))
                    .addGroup(Sales1Layout.createSequentialGroup()
                        .addGroup(Sales1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(Sales1Layout.createSequentialGroup()
                                .addGroup(Sales1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                                    .addComponent(jLabel28)
                                    .addComponent(jLabel7)
                                    .addComponent(jLabel3, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                                    .addComponent(jLabel5)
                                    .addComponent(jLabel8)
                                    .addComponent(tfWFMax, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                                .addGroup(Sales1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addGroup(Sales1Layout.createSequentialGroup()
                                        .addGap(226, 226, 226)
                                        .addComponent(jLabel6))
                                    .addGroup(Sales1Layout.createSequentialGroup()
                                        .addGap(18, 18, 18)
                                        .addGroup(Sales1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                            .addComponent(jLabel29)
                                            .addComponent(tfWFMin, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE))
                                        .addGap(18, 18, 18)
                                        .addGroup(Sales1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                                            .addComponent(jLabel30)
                                            .addComponent(tfWFSum, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)))))
                            .addGroup(Sales1Layout.createSequentialGroup()
                                .addGroup(Sales1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(tfMFMax, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(jLabel24))
                                .addGap(18, 18, 18)
                                .addGroup(Sales1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                                    .addComponent(tfMFMin, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(jLabel25))
                                .addGap(18, 18, 18)
                                .addGroup(Sales1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                                    .addComponent(tfMFSum, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(jLabel26)))
                            .addGroup(Sales1Layout.createSequentialGroup()
                                .addGroup(Sales1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(jLabel15)
                                    .addGroup(Sales1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                                        .addComponent(tfHBMax, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                                        .addComponent(jLabel4, javax.swing.GroupLayout.DEFAULT_SIZE, 90, Short.MAX_VALUE)))
                                .addGap(18, 18, 18)
                                .addGroup(Sales1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                                    .addComponent(jLabel16)
                                    .addComponent(tfHBMin, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE))
                                .addGap(18, 18, 18)
                                .addGroup(Sales1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                                    .addComponent(jLabel17)
                                    .addComponent(tfHBSum, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)))
                            .addGroup(Sales1Layout.createSequentialGroup()
                                .addGroup(Sales1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(jLabel9)
                                    .addComponent(tfEDMax, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE))
                                .addGap(18, 18, 18)
                                .addGroup(Sales1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(jLabel10)
                                    .addComponent(tfEDMin, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE))
                                .addGap(18, 18, 18)
                                .addGroup(Sales1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(tfEDSum, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(jLabel13)))
                            .addGroup(Sales1Layout.createSequentialGroup()
                                .addGroup(Sales1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(tfHAMax, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(jLabel20))
                                .addGap(18, 18, 18)
                                .addGroup(Sales1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                                    .addComponent(tfHAMin, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(jLabel21))
                                .addGap(18, 18, 18)
                                .addGroup(Sales1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                                    .addComponent(tfHASum, javax.swing.GroupLayout.PREFERRED_SIZE, 90, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(jLabel22))))
                        .addContainerGap(32, Short.MAX_VALUE))))
        );
        Sales1Layout.setVerticalGroup(
            Sales1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(Sales1Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(Sales1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addGroup(Sales1Layout.createSequentialGroup()
                        .addComponent(jLabel3)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(jLabel9)
                        .addGap(3, 3, 3)
                        .addComponent(tfEDMax, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addGroup(Sales1Layout.createSequentialGroup()
                        .addComponent(jLabel10)
                        .addGap(3, 3, 3)
                        .addComponent(tfEDMin, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addGroup(Sales1Layout.createSequentialGroup()
                        .addComponent(jLabel13)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(tfEDSum, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addGroup(Sales1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addGroup(Sales1Layout.createSequentialGroup()
                        .addComponent(jLabel4)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(jLabel15)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(tfHBMax, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addGroup(Sales1Layout.createSequentialGroup()
                        .addComponent(jLabel16)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(tfHBMin, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addGroup(Sales1Layout.createSequentialGroup()
                        .addComponent(jLabel17)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(tfHBSum, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)))
                .addGap(8, 8, 8)
                .addGroup(Sales1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addGroup(Sales1Layout.createSequentialGroup()
                        .addComponent(jLabel5)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(jLabel20)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(tfHAMax, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addGroup(Sales1Layout.createSequentialGroup()
                        .addComponent(jLabel21)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(tfHAMin, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addGroup(Sales1Layout.createSequentialGroup()
                        .addComponent(jLabel22)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(tfHASum, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)))
                .addGroup(Sales1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(Sales1Layout.createSequentialGroup()
                        .addGap(8, 8, 8)
                        .addComponent(jLabel7)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(jLabel24)
                        .addGap(3, 3, 3)
                        .addComponent(tfMFMax, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addGroup(Sales1Layout.createSequentialGroup()
                        .addGap(24, 24, 24)
                        .addComponent(jLabel6))
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, Sales1Layout.createSequentialGroup()
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addGroup(Sales1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                            .addGroup(Sales1Layout.createSequentialGroup()
                                .addComponent(jLabel26)
                                .addGap(3, 3, 3)
                                .addComponent(tfMFSum, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, Sales1Layout.createSequentialGroup()
                                .addComponent(jLabel25)
                                .addGap(3, 3, 3)
                                .addComponent(tfMFMin, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)))))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(jLabel8)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(Sales1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addGroup(Sales1Layout.createSequentialGroup()
                        .addComponent(jLabel28)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(tfWFMax, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addGroup(Sales1Layout.createSequentialGroup()
                        .addComponent(jLabel29)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(tfWFMin, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addGroup(Sales1Layout.createSequentialGroup()
                        .addComponent(jLabel30)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(tfWFSum, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 17, Short.MAX_VALUE)
                .addGroup(Sales1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(MONTH)
                    .addComponent(cbMonth, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(18, 18, 18)
                .addGroup(Sales1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jbImport)
                    .addComponent(jbCalculate)
                    .addComponent(jbClear))
                .addContainerGap(54, Short.MAX_VALUE))
        );

        tblSales.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {

            },
            new String [] {
                "PRODUCT NAME", "CATEGORY", "PRICE", "QUANTITY"
            }
        ));
        tblSales.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                tblSalesMouseClicked(evt);
            }
        });
        jScrollPane1.setViewportView(tblSales);

        jPanel1.setBackground(new java.awt.Color(0, 51, 51));

        jLabel11.setFont(new java.awt.Font("Futura Bk BT", 1, 18)); // NOI18N
        jLabel11.setForeground(new java.awt.Color(255, 255, 255));
        jLabel11.setIcon(new javax.swing.ImageIcon("C:\\Users\\Akmal Nizam\\Desktop\\CSC232 Final Project\\Pic\\icons8-online-shopping-40.png")); // NOI18N
        jLabel11.setText("ADMIN PAGE");

        jbCategory.setBackground(new java.awt.Color(0, 102, 102));
        jbCategory.setFont(new java.awt.Font("Futura Bk BT", 1, 18)); // NOI18N
        jbCategory.setForeground(new java.awt.Color(255, 255, 255));
        jbCategory.setText("CATEGORY");
        jbCategory.setBorder(null);
        jbCategory.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jbCategoryActionPerformed(evt);
            }
        });

        jbCustInfo.setBackground(new java.awt.Color(0, 102, 102));
        jbCustInfo.setFont(new java.awt.Font("Futura Bk BT", 1, 18)); // NOI18N
        jbCustInfo.setForeground(new java.awt.Color(255, 255, 255));
        jbCustInfo.setText("CUST INFO");
        jbCustInfo.setBorder(null);
        jbCustInfo.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jbCustInfoActionPerformed(evt);
            }
        });

        jbSales.setBackground(new java.awt.Color(0, 102, 102));
        jbSales.setFont(new java.awt.Font("Futura Bk BT", 1, 18)); // NOI18N
        jbSales.setForeground(new java.awt.Color(255, 255, 255));
        jbSales.setText("SALES");
        jbSales.setBorder(null);
        jbSales.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jbSalesActionPerformed(evt);
            }
        });

        jbPos.setBackground(new java.awt.Color(0, 102, 102));
        jbPos.setFont(new java.awt.Font("Futura Bk BT", 1, 18)); // NOI18N
        jbPos.setForeground(new java.awt.Color(255, 255, 255));
        jbPos.setText("LOGOUT");
        jbPos.setBorder(null);
        jbPos.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jbPosActionPerformed(evt);
            }
        });

        jbExit.setBackground(new java.awt.Color(0, 102, 102));
        jbExit.setFont(new java.awt.Font("Futura Bk BT", 1, 18)); // NOI18N
        jbExit.setForeground(new java.awt.Color(255, 255, 255));
        jbExit.setText("EXIT");
        jbExit.setBorder(null);
        jbExit.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jbExitActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jbCategory, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
            .addComponent(jbCustInfo, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
            .addComponent(jbSales, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
            .addComponent(jbPos, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
            .addComponent(jbExit, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jSeparator1)
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel1Layout.createSequentialGroup()
                        .addGap(0, 9, Short.MAX_VALUE)
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel1Layout.createSequentialGroup()
                                .addComponent(jLabel12)
                                .addGap(131, 131, 131))
                            .addComponent(jLabel11, javax.swing.GroupLayout.Alignment.TRAILING))))
                .addContainerGap())
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addComponent(jLabel12)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(jLabel11)
                .addGap(4, 4, 4)
                .addComponent(jSeparator1, javax.swing.GroupLayout.PREFERRED_SIZE, 10, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(18, 18, 18)
                .addComponent(jbCategory, javax.swing.GroupLayout.PREFERRED_SIZE, 37, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jbCustInfo, javax.swing.GroupLayout.PREFERRED_SIZE, 37, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jbSales, javax.swing.GroupLayout.PREFERRED_SIZE, 37, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jbPos, javax.swing.GroupLayout.PREFERRED_SIZE, 37, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jbExit, javax.swing.GroupLayout.PREFERRED_SIZE, 37, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(0, 0, Short.MAX_VALUE))
        );

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addComponent(jPanel1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(0, 0, 0)
                .addComponent(Sales1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jScrollPane1, javax.swing.GroupLayout.DEFAULT_SIZE, 444, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jPanel1, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
            .addGroup(layout.createSequentialGroup()
                .addComponent(Sales1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(0, 0, Short.MAX_VALUE))
            .addComponent(jScrollPane1)
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void tblSalesMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_tblSalesMouseClicked
       
    }//GEN-LAST:event_tblSalesMouseClicked

    private void jbImportActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jbImportActionPerformed
        String month = cbMonth.getSelectedItem().toString();
        String filePath = "C:\\Users\\Akmal Nizam\\Desktop\\CSC232 Final Project\\UserData\\MONTHS\\"+month+".txt";
        File file = new File(filePath);

        try {
            FileReader fr = new FileReader(file);
            BufferedReader br = new BufferedReader(fr);

            DefaultTableModel model = (DefaultTableModel)tblSales.getModel();
            Object[] lines = br.lines().toArray();

            for(int i = 0; i < lines.length; i++){
                String[] row = lines[i].toString().split(",");
                model.addRow(row);
            }

        } catch (FileNotFoundException ex) {
            Logger.getLogger(Sales.class.getName()).log(Level.SEVERE, null, ex);
        }
    }//GEN-LAST:event_jbImportActionPerformed

    private void jbCalculateActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jbCalculateActionPerformed
        getSum();
        getMaxMin();
        // TODO add your handling code here:
    }//GEN-LAST:event_jbCalculateActionPerformed

    private void tfHAMinActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_tfHAMinActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_tfHAMinActionPerformed

    private void jbClearActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jbClearActionPerformed
        tblSales.setModel(new DefaultTableModel(null,new String[]{"PRODUCT NAME","CATEGORY","PRICE","QUANTITY"}));
        // TODO add your handling code here:
    }//GEN-LAST:event_jbClearActionPerformed

    private void jbExitActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jbExitActionPerformed
        System.exit(0);
        // TODO add your handling code here:
    }//GEN-LAST:event_jbExitActionPerformed

    private void jbPosActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jbPosActionPerformed
        Login log = new Login();
        log.setVisible(true);
        this.dispose();
        // TODO add your handling code here:
    }//GEN-LAST:event_jbPosActionPerformed

    private void jbSalesActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jbSalesActionPerformed
        Sales s = new Sales();
        s.setVisible(true);
        this.dispose();
        // TODO add your handling code here:
    }//GEN-LAST:event_jbSalesActionPerformed

    private void jbCustInfoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jbCustInfoActionPerformed
        CustInfo ci = new CustInfo();
        ci.setVisible(true);
        this.dispose();
        // TODO add your handling code here:
    }//GEN-LAST:event_jbCustInfoActionPerformed

    private void jbCategoryActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jbCategoryActionPerformed
        AdminPage ap = new AdminPage();
        ap.setVisible(true);
        this.dispose();
        // TODO add your handling code here:
    }//GEN-LAST:event_jbCategoryActionPerformed
    
    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        
        DecimalFormat myFormatter = new DecimalFormat("##.00");
        
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(Sales.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(Sales.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(Sales.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(Sales.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>


        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new Sales().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JLabel MONTH;
    private javax.swing.JPanel Sales1;
    private javax.swing.JComboBox<String> cbMonth;
    private javax.swing.JLabel jLabel10;
    private javax.swing.JLabel jLabel11;
    private javax.swing.JLabel jLabel12;
    private javax.swing.JLabel jLabel13;
    private javax.swing.JLabel jLabel15;
    private javax.swing.JLabel jLabel16;
    private javax.swing.JLabel jLabel17;
    private javax.swing.JLabel jLabel20;
    private javax.swing.JLabel jLabel21;
    private javax.swing.JLabel jLabel22;
    private javax.swing.JLabel jLabel24;
    private javax.swing.JLabel jLabel25;
    private javax.swing.JLabel jLabel26;
    private javax.swing.JLabel jLabel28;
    private javax.swing.JLabel jLabel29;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel30;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JLabel jLabel5;
    private javax.swing.JLabel jLabel6;
    private javax.swing.JLabel jLabel7;
    private javax.swing.JLabel jLabel8;
    private javax.swing.JLabel jLabel9;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JSeparator jSeparator1;
    private javax.swing.JButton jbCalculate;
    private javax.swing.JButton jbCategory;
    private javax.swing.JButton jbClear;
    private javax.swing.JButton jbCustInfo;
    private javax.swing.JButton jbExit;
    private javax.swing.JButton jbImport;
    private javax.swing.JButton jbPos;
    private javax.swing.JButton jbSales;
    private javax.swing.JTable tblSales;
    private javax.swing.JTextField tfEDMax;
    private javax.swing.JTextField tfEDMin;
    private javax.swing.JTextField tfEDSum;
    private javax.swing.JTextField tfHAMax;
    private javax.swing.JTextField tfHAMin;
    private javax.swing.JTextField tfHASum;
    private javax.swing.JTextField tfHBMax;
    private javax.swing.JTextField tfHBMin;
    private javax.swing.JTextField tfHBSum;
    private javax.swing.JTextField tfMFMax;
    private javax.swing.JTextField tfMFMin;
    private javax.swing.JTextField tfMFSum;
    private javax.swing.JTextField tfWFMax;
    private javax.swing.JTextField tfWFMin;
    private javax.swing.JTextField tfWFSum;
    // End of variables declaration//GEN-END:variables
}
