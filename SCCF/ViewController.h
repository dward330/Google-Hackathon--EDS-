//
//  ViewController.h
//  SCCF
//
//  Created by Kenneth Coury on 2/18/15.
//  Copyright (c) 2015 Kenneth Coury. All rights reserved.
//

#import <UIKit/UIKit.h>
#import "VariableStore.h"

@interface ViewController : UIViewController <UINavigationControllerDelegate,UIImagePickerControllerDelegate> {
    
    
    IBOutlet UIButton *button1;
    IBOutlet UIButton *button2;
    IBOutlet UIImageView *white;
    IBOutlet UILabel *noPhoto;
    
    
    
    
    
    IBOutlet UIImageView *ImageView;
    UIImagePickerController *picker;
    UIImage *image;
}

-(IBAction)hide1;
-(IBAction)hide2;


-(IBAction)reveal1;
-(IBAction)reveal2;


- (IBAction)TakePhoto:(id)sender;
- (IBAction)PhotoLibary:(id)sender;


@end


