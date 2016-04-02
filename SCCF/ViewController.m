//
//  ViewController.m
//  SCCF
//
//  Created by Kenneth Coury on 2/18/15.
//  Copyright (c) 2015 Kenneth Coury. All rights reserved.
//

#import "ViewController.h"


@implementation ViewController

-(void)viewDidLoad{
    //make sure continue button is hidden on screen load (even if user returns to previous sreen)
    button1.hidden = YES;
}

//continue button
-(IBAction)hide1 {
    button1.hidden = YES;
}

//no photo button
-(IBAction)hide2 {
    button2.hidden = YES;




}
-(IBAction)reveal1 {
    button1.hidden = NO;
    white.hidden = NO;

}
-(IBAction)reveal2 {
    button2.hidden = NO;
}



- (IBAction)TakePhoto:(id)sender {
    picker = [[UIImagePickerController alloc] init];
    picker.delegate = self;
    [picker setSourceType:UIImagePickerControllerSourceTypeCamera];
    [self presentViewController:picker animated:YES completion:NULL];
    
}

- (IBAction)PhotoLibary:(id)sender {
    
    picker = [[UIImagePickerController alloc] init];
    picker.delegate = self;
   [picker setSourceType:UIImagePickerControllerSourceTypePhotoLibrary];
    [self presentViewController:picker animated:YES completion:NULL];
}

-(void)imagePickerController:(UIImagePickerController *)picker didFinishPickingMediaWithInfo:(NSDictionary *)info {
    image = [info objectForKey:@"UIImagePickerControllerOriginalImage"];
    [ImageView setImage:image];
    [[VariableStore sharedInstance] setImage :image];
    [self dismissViewControllerAnimated:YES completion:NULL];
}

-(void)imagePickerControllerDidCancel:(UIImagePickerController *)picker {
    button2.hidden = NO;
    button1.hidden = YES;
    white.hidden = YES;
    [self dismissViewControllerAnimated:YES completion:NULL];
}

@end
